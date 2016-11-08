<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 21/12/2015
 * Time: 10:33 AM
 */
class Reportes extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function clientesRep($d1 , $d2,$d3)
    {

        /*$this->db->select('itmCls,itmDate, itmFact, itmStatusFact, SUM(itmRemainder)as ptos,itmClsName, SUM(itmPts) as Pts,ItmSlpName, ((SUM(itmPts)) - (SUM(itmRemainder))) as canje ');
        $this->db->from('oitm');
        $this->db->join('oslp', 'oslp.SlpID = oitm.itmCls');
        if ($d3 !="CLIENTE") {
            $this->db->where('itmCls', $d3);
        }        
        $this->db->where('itmDate BETWEEN "'.$d1.'" AND "'.$d2.'"');
        $this->db->where('ItmStus', 1);
        
        $this->db->group_by('itmFact');
        $this->db->order_by('itmDate');
        $query = $this->db->get();*/

        $query = $this->db->query("SELECT itmCls,itmDate, itmFact, itmStatusFact, SUM(itmRemainder)as Pts,itmClsName,
                                 CASE ItmStatusFact
                                    WHEN 'CANCELADA' THEN 0
                                    ELSE SUM(itmRemainder)
                                END  AS ptos,
                                ItmSlpName, ((SUM(itmPts)) - (SUM(itmRemainder))) as canje 
                                FROM oitm INNER JOIN oslp ON oslp.SlpID = oitm.itmCls
                                WHERE itmCls='".$d3."' AND itmDate BETWEEN '".$d1."' and '".$d2."' and ItmStus =1
                                GROUP BY itmFact
                                ORDER BY itmDate");
       if($query->num_rows() > 0){
            return $query->result_array();
        }
        return 0;
    }
/***************** PUNTOS CANGEABLES DE LOS CLIENTES ***********************/
  /*public function cangeable($cond)
    {   
       
        $R='CANCELADA'; 

        $this->db->select('IFNULL(SUM(itmRemainder),0) as total',false);
        $this->db->from('oitm');  
        $this->db->where('itmCls',$cond);
        $this->db->where('itmStatusFact',$R);       
        $query = $this->db->get();
        if($query->num_rows() > 0){            
            return $query->row()->total;
            }
        return 0;
     }
*/

    public function mdpRep($d1 , $d2){
        $this->db->select('itmProduc, ItmSlpName, itmDscripcion, SUM(itmCnt) as Cant, SUM(itmPts) as Pts');
        $this->db->from('oitm');
        $this->db->where('itmDate BETWEEN "'.$d1.'" AND "'.$d2.'"');
        $this->db->group_by('itmProduc');
        $this->db->order_by('itmProduc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return 0;
    }
    public function vendedor($d1,$d2,$cond){


        $this->db->select('itmDate,itmProduc, itmDscripcion, ItmSlpName');
        $this->db->from('oitm');
        $this->db->where('itmProduc',$cond);
       $this->db->where('itmDate BETWEEN "'.$d1.'" AND "'.$d2.'"');
        $this->db->group_by('ItmSlpName');

        $query = $this->db->get();
        if($query->num_rows() > 0){
            //return $query->result_array();
            foreach ($query->result_array() as $key ) {
                //echo $key['ItmSlpName'].'<br>';
               
                @$Arrya .= "[".$key['ItmSlpName']."],";
            }
        }
        return substr($Arrya, 0,-1);

    }
    public function Rastrear($F1,$F2){

        $this->db->select('
            itmCls,
            itmClsName ,
            SUM(case when M = 1 then itmPts end)  as Ene,
            SUM(case when M = 2 then itmPts end) as Feb,
            SUM(case when M = 3 then itmPts end) as Mar,
            SUM(case when M = 4 then itmPts end) as Abr,
            SUM(case when M = 5 then itmPts end) as May,
            SUM(case when M = 6 then itmPts end) as Jun,
            SUM(case when M = 7 then itmPts end) as Jul,
            SUM(case when M = 8 then itmPts end) as Ago,
            SUM(case when M = 9 then itmPts end) as Sep,
            SUM(case when M = 10 then itmPts end) as Oct,
            SUM(case when M = 11 then itmPts end) as Nov,
            SUM(case when M = 12 then itmPts end) as Dic,
            itmSlpCode,
            ItmSlpName
            ');
        $this->db->from('view_report_formonth');
        $this->db->where('itmDate BETWEEN "'.$F1.'" AND "'.$F2.'"');
        $this->db->group_by('itmCls');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return 0;
    }



    /********** Reportes nuevos ***************/
/*puntos por producto*/
    public function ppuntos($F1,$F2)
    {
       $di=0;
      
        $this->db->select('itmProduc, itmDscripcion,
            SUM((case when MONTH(itmDate)= 1 then itmRemainder end))  as Ene,
             SUM((case when MONTH(itmDate) = 2 then itmRemainder end)) as Feb,
             SUM((case when MONTH(itmDate) = 3 then itmRemainder end)) as Mar,
             SUM((case when MONTH(itmDate) = 4 then itmRemainder end)) as Abr,
             SUM((case when MONTH(itmDate) = 5 then itmRemainder end)) as May,
             SUM((case when MONTH(itmDate) = 6 then itmRemainder end)) as Jun,
             SUM((case when MONTH(itmDate) = 7 then itmRemainder end)) as Jul,
             SUM((case when MONTH(itmDate)= 8 then itmRemainder end)) as Ago,
             SUM((case when MONTH(itmDate)= 9 then itmRemainder end)) as Sep,
             SUM((case when MONTH(itmDate)= 10 then itmRemainder end)) as Oct,
             SUM((case when MONTH(itmDate)= 11 then itmRemainder end)) as Nov,
             SUM((case when MONTH(itmDate) =12 then itmRemainder end)) as Dic                    
        ');
        $this->db->from('oitm');
        $this->db->where('itmRemainder !=',$di);
        $this->db->where('itmDate BETWEEN "'.$F1.'" AND "'.$F2.'"');
        $this->db->group_by('itmProduc');
        $this->db->order_by('itmProduc');
        $query = $this->db->get();

        
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }

   /*** puntos que  tienen cada cliente  ***/
    public function puntoCliente($F1,$F2)
    {
        $di=0;
        $this->db->select('t2.SlpName, t2.SlpID, t1.itmClsName,
            SUM((case when MONTH(itmDate)= 1 then (t1.itmRemainder) end))  as Ene,
            SUM((case when MONTH(itmDate) = 2 then (t1.itmRemainder) end)) as Feb,
            SUM((case when MONTH(itmDate) = 3 then (t1.itmRemainder) end)) as Mar,
            SUM((case when MONTH(itmDate) = 4 then (t1.itmRemainder) end)) as Abr,
            SUM((case when MONTH(itmDate) = 5 then (t1.itmRemainder) end)) as May,
            SUM((case when MONTH(itmDate) = 6 then (t1.itmRemainder) end)) as Jun,
            SUM((case when MONTH(itmDate) = 7 then (t1.itmRemainder) end)) as Jul,
            SUM((case when MONTH(itmDate)= 8 then (t1.itmRemainder) end)) as Ago,
            SUM((case when MONTH(itmDate)= 9 then (t1.itmRemainder) end)) as Sep,
            SUM((case when MONTH(itmDate)= 10 then (t1.itmRemainder) end)) as Oct,
            SUM((case when MONTH(itmDate)= 11 then (t1.itmRemainder) end)) as Nov,
            SUM((case when MONTH(itmDate) =12 then (t1.itmRemainder) end)) as Dic');
        $this->db->from('oitm t1');
        $this->db->join('oslp  t2','t1.itmCls = t2.SlpID');
        $this->db->where('itmRemainder !=',$di);
        $this->db->where('itmDate BETWEEN "'.$F1.'" AND "'.$F2.'"');
        $this->db->group_by('t1.itmClsName');
        $this->db->order_by('SUM(t1.itmRemainder)');

        $query = $this->db->get();

        
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;

    }

    /************ FACTURAS ANULADAS EN EL SISTEMA EXACTUS ************/

         public function fac($F1,$F2)
    {
        $Array = $this->sqlsrv -> fetchArray("SELECT COUNT(Fecha_de_factura) as factura FROM WEB_PTOS_UMG_FULL_GROUP WHERE ANULADA='S' AND 
           CONVERT(date,Fecha_de_factura) '".$F1."' AND '".$F2."'  GROUP BY Fecha_de_factura ORDER BY Fecha_de_factura",SQLSRV_FETCH_ASSOC);
 
         return $Array;
         
       $this->sqlsrv->close();
     

    }


    /******************facturas anuladas en el sistema de puntos UMA!!!*******************/
    public function FactAnulada ($F1,$F2)
    {

        $condicion='AFR';
        $this->db->select('itmDate, COUNT(itmFact) as facts');
        $this->db->from('oitm');
        $this->db->where('ItmWhyMod',$condicion);
        $this->db->where('itmDate BETWEEN "'.$F1.'" AND "'.$F2.'"');
        $this->db->group_by('itmDate');
        $this->db->order_by('facts');

        $query=$this->db->get();
        
        if ($query->num_rows() > 0) 
        { 
            return $query->result_array();
           
        }

        return 0;
    }
    /********************** facturas lista ***************/
    

   
      public function S_Clientes()
    {
        /*select * from oslp where SlpID  in (select itmCls from oitm) and Privilegio=0
ORDER BY SlpCodCliente ASC*/
      //  $cons=('select itmCls from oitm');
        $this->db->select('itmCls,SlpID,SlpCodCliente');
        $this->db->from('oslp'); 
       $this->db->join('oitm',' itmCls=SlpID');
        //$this->db->where('Privilegio','0');
        $this->db->where_in($this->db->query('select itmCls from oitm'));
        $this->db->where('Privilegio','0');

       $this->db->group_by('itmCls');
       $this->db->order_by('SlpCodCliente','ASC');
       // $this->db->order_by('SlpCodCliente','ASC');

         $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;

  }
  public function factura ($F1,$F2)
    {
        $di=0;
        $this->db->select('itmDate , itmFact,itmCls as COD,itmClsName,ItmStatusFact, SUM(itmPts) as PTOS, (itmPts - itmRemainder) as
        CANJEADO, SUM(itmRemainder) as DISPO, ItmSlpCode,ItmSlpName');
        
        $this->db->from('oitm ');
        //$this->db->join('tblfrpline t2 ','t1.itmFact = t2.codBoucher');
        //$this->db->where('t1.itmRemainder !=', $di);
        $this->db->where('itmDate BETWEEN "'.$F1.'" AND "'.$F2.'"');
        $this->db->group_by('itmClsName');
        /*$this->db->order_by('itmFact');*/
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;

    }
  public function EstadoFactura($cond){
        $estado='CANCELADA';
        $this->db->select('SUM(itmRemainder) as DISPO');
        $this->db->from('oitm'); 
        $this->db->where('ItmStatusFact',$estado);
        $this->db->where('itmCls',$cond);
        $this->db->group_by('itmClsName');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row()->DISPO;
        }
        return 0;
  }

}