<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 02/12/2015
 * Time: 03:53 PM
 */
class Clientes extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function clientes(){
        $this->db->where('Privilegio > ', 0);
        
        $query = $this->db->get('oslp');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return 0;
    }
    public function save($user, $pass, $priv, $act){
        $data = array(
            'SlpName' => $user ,
            'SlpPassword' => $pass ,
            'Privilegio' =>  $priv,
            'Active' =>  $act,
            'Fecha_Creacion' => date('Y-m-d')
        );
        $insert= $this->db->insert('oslp', $data);
        if($insert){
            return 1;
        }
        return 0;
    }
    public function del($id){
        $this->db->where('SlpCode', $id);
        $delete= $this->db->delete('oslp');
        if($delete){
            return 1;
        }
        return 0;
    }
    public function StatusFact($cls,$d1,$d2){
        $this->db->order_by("itmDate", "desc");
        $this->db->where('itmCls', $cls);
        $this->db->where('itmDate >=', $d1);
        $this->db->where('itmDate <=', $d2);
        $query=$this->db->get('view_admin_mtpts_full');
        if ($query->num_rows()>0) {
            $i=0;
            $json = array();

            foreach ($query->result_array() as $key) {
                $json['data'][$i]['itmFact'] = $key['itmFact'];
                $json['data'][$i]['itmDate'] = $key['itmDate'];
                $json['data'][$i]['itmPts'] = $key['itmPts'];
                $json['data'][$i]['ItmStus'] = $this->estados->FacturasEstados($key['ItmStus']);
                $i++;
            }

        } else {
            $json['data'][0]['itmFact'] = "";
            $json['data'][0]['itmDate'] = "";
            $json['data'][0]['itmPts'] = "";
            $json['data'][0]['ItmStus'] = "";
        }
        echo json_encode($json);


    }
    public function lastPagos($IDs){
        $Array = $this->sqlsrv -> fetchArray("SELECT * FROM dbo.WEB_DOCUMENTOS_CC_UMG WHERE DOCUMENTO in (".$IDs.") ",SQLSRV_FETCH_ASSOC);
        $json = array();
         

        $i=0;
        foreach ($Array as $fila) {
            $json['data'][$i]['DOCUMENTO'] = $fila['DOCUMENTO'];            
            $json['data'][$i]['FECHA_DOCUMENTO'] = $fila['FECHA_DOCUMENTO'];
            $json['data'][$i]['MONTO'] ='C$ '.number_format($fila['MONTO'],2);
            $json['data'][$i]['SALDO'] = 'C$ '.number_format($fila['SALDO'],2);
            $json['data'][$i]['ESTADO'] =$fila['ESTADO'];
            $date=date_create($fila['FECHA_VENCE']);

            $json['data'][$i]['FECHA_VENCE'] =date_format($date,'d/m/Y');
            //$json['data'][$i]['FECHA_VENCE'] =substr($fila['FECHA_VENCE'], 0,10);
           // $json['data'][$i]['DiasVencidos'] =$fila['DiasVencidos'];
            if($fila['ESTADO']=="CANCELADA"){
                $json['data'][$i]['DiasVencidos'] ='0';
               }
               elseif ($fila['ESTADO']=="PENDIENTE"){
                   $json['data'][$i]['DiasVencidos'] =$fila['DiasVencidos'];
               }
             $i++;
        }
        $this->sqlsrv->close();
        echo json_encode($json);


    }
}