<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 03/12/2015
 * Time: 04:29 PM
 */
class Canjes extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function master()
    {
        $this->db->select('frpCode,frpFecha, frpCliente, oslp.SlpCodCliente');
        $this->db->join('oslp', 'oslp.SlpID = tblfrp.frpCliente', 'inner');
        $query = $this->db->get('tblfrp');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }
    public function getFrp($cod)
    {

        $this->db->where('frpCode', $cod);
        $this->db->select('frpCode,frpCliente,oslp.SlpCodCliente, frpFecha');
        $this->db->join('oslp', 'oslp.SlpID = tblfrp.frpCliente', 'inner');
        $query1 = $this->db->get('tblfrp');
        if ($query1->num_rows() > 0)
        {
            $this->db->group_by("codBoucher");
            $this->db->where('frpCode', $cod);
            $this->db->select('codBoucher, cantApl, SUM(cantApl) as total');
            $query2 = $this->db->get('tblfrpline');

            $this->db->where('CodFrp', $cod);
            $this->db->select('CodProduct, Cant, HistPts, mtct.tctNombreProd');
            $this->db->join('mtct', 'mtct.tctCodigo = tblfrpproduct.CodProduct', 'inner');
            $query3 = $this->db->get('tblfrpproduct');


            $datos = array(
                'frp' => $query1->result_array(),
                'frpline' => $query2->result_array(),
                'frpProd' => $query3->result_array());
            return $datos;
        }
        return 0;
    }
    public function articulos($slug = false)
    {
        $query = $this->db->get('mtct');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }
    public function articuloLinea($slug)
    {
        $this->db->where('tctCodigo', $slug);
        $query = $this->db->get('mtct');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }

    /*LISTA DE CLIENTES QUE APLICAN A LOS PREMIOS SI LAS FACTURAS ESTAN EN ESTADO = "CANCELADA"*/
    public function clientePts($slug)
    {

        $condition='CANCELADA';
        $this->db->group_by("itmCls");
        $this->db->where('itmPts >=', $slug);
        $this->db->where('Estado',$condition);
        $query = $this->db->get('view_admin_mtpts');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }

    /*PARA EL ESTADO DE CUENTA DE PUNTOS POR CLIENTE*/
    public function mdpEdoCta($Cliente, $Desde, $Hasta)
    {
        //$this->db->where('itmCls', $Cliente);        
        $this->db->query("SELECT itmFact, itmDate, itmPts, APLI, itmPts-APLI itmDisponibles, 
                                 CASE ItmStus WHEN 1 THEN 'ACTIVO' WHEN 0 THEN 'INACTIVO' ELSE '' END  AS 'Estado' 
                          FROM view_admin_mtpts_full 
                          WHERE itmCls = '".$Cliente."' AND itmDate Between '".$Desde."' and '".$Hasta."' ");
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }

    /*LISTA DE CLIENTES QUE APLICAN A LOS PREMIOS SI LAS FACTURAS ESTAN EN ESTADO = "CANCELADA"*/
    public function bouchers($slug)
    {
        $this->db->where('itmCls', $slug);
        $this->db->where('itmStus', 1);
        $this->db->where('apli !=', 0);
        $query = $this->db->get('view_admin_mtpts_full');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }

    // suma de puntos totales de las facturas canceladas
    public function sumaPuntos($slug)
    {
        // $this->db->select_sum('itmPts', 'Total');
        $this->db->where('itmCls', $slug);
        $this->db->where('itmStus', 1);
        $this->db->where('apli !=',0);
        $this->db->select('SUM(itmPts) AS Total');
        $query = $this->db->get('view_admin_mtpts_full');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }
    public function guardar($frp, $cli, $ruta)
    {
        $data = array(
            'frpCode' => $frp,
            'frpCliente' => $cli,
            'frpRuta' => $ruta,
            'frpFecha' => date('Y-m-d h:i:sa'),
            'frpUser' => $this->session->userdata('idUser'));
        $insert = $this->db->insert('tblfrp', $data);
        if ($insert)
        {
            return 1;
        }
        return 0;
    }
    public function lineprod($cod, $frp, $cant, $hist)
    {
        $data = array(
            'CodProduct' => $cod,
            'CodFrp' => $frp,
            'Cant' => $cant,
            'HistPts' => $hist);
        $insert = $this->db->insert('tblfrpproduct', $data);
        if ($insert)
        {
            return 1;
        }
        return 0;
    }
    public function frpRemanente($fact)
    {
        $this->db->order_by('itmk, itmCls, itmDate,itmFact');
        $this->db->where('itmRemainder >', 0);
        $this->db->where('itmFact', $fact);
        $this->db->select('itmk, itmCls,itmDate, itmFact, itmRemainder');
        $query = $this->db->get('oitm');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }
    public function linebouch($frp, $bouch, $apli, $descrip)
    {
        $data = array(
            'frpCode' => $frp,
            'codBoucher' => $bouch,
            'cantApl' => $apli,
            'Descript' => utf8_encode($descrip));
        $insert = $this->db->insert('tblfrpline', $data);
        if ($insert)
        {
            return 1;
        }
        return 0;
    }
    public function verificar($frp)
    {
        $this->db->where('frpCode', $frp);
        $query = $this->db->get('tblfrp');
        if ($query->num_rows() == 1)
        {
            return 1;
        }
        return 0;
    }
    /* public function calculoCanje($frp){
    $this->db->where('frpCode', $frp);
    $this->db->select('SUM(cantApl) AS total');
    $suma = $this->db->get('tblfrpline');

    if(is_null($suma)){
    return 0;
    }
    else{
    return $suma->result_array();
    }
    }*/
    public function updatefrp($id, $cant)
    {
        if ($cant == 0)
        {
            $status = 0;
            $mod = 'AFR';
        } else
        {
            $status = 1;
            $mod = '';
        }
        $data = array(
            'itmRemainder' => $cant,
            'itmStus' => $status,
            'ItmWhyMod' => $mod);
        $this->db->where('itmk', $id);
        $this->db->update('oitm', $data);

    }


}
