<?php
/**
 * Created by PhpStorm.
 * User: A7M
 * Date: 08/12/2015
 * Time: 16:20
 */
class Catalogos  extends CI_Model{
    function SaveProducto($Img,$Name,$Pts,$cod){
        $data = array(
            'tctUrlimg' => $Img ,
            'tctNombreProd' => $Name,
            'tctCodigo' => $cod,
            'tctPuntos' => $Pts
        );
        $this->db->insert('mtct', $data);
    }
    function EliminarProduct($id){
        $this->db->where('tctId',$id);
        $query=$this->db->get('mtct');
        if ($query->num_rows()>0) {
            foreach($query->result_array() as $key){
                unlink('uploads/'.$key['tctUrlimg']);
            }
        }
        $this->db->delete('mtct', array('tctId' => $id));
    }
      function EliminarFile($id){
        $this->db->where('tctId',$id);
        $query=$this->db->get('mtct');
        if ($query->num_rows()>0) {
            foreach($query->result_array() as $key){
                unlink('uploads/'.$key['tctUrlimg']);
            }
        }
    }
    function mtct(){
        $query=$this->db->get('mtct');
        if ($query->num_rows()>0) {
            return $query;
        } else {
            return false;
        }
    }
    function GetProducto($id){
        $this->db->where('tctId',$id);
        $query=$this->db->get('mtct');

        if ($query->num_rows()>0) {
            return $query;
        } else {
            return false;
        }
    }
     function UpdatProducto($name,$pts,$id,$file,$cod){
        $this->EliminarFile($id);        
        $data = array(
            'tctCodigo' => $cod,
            'tctNombreProd' => $name,
            'tctUrlimg' => $file,
            'tctPuntos' => $pts
        );
        $this->db->where('tctId', $id);
        $this->db->update('mtct', $data);
    }
    function AllClPro(){
        //$this->db->where('tctPuntos <=',$id);
        $query=$this->db->get('mtct');
        if ($query->num_rows()>0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function UiFactDetalle($id){
        $this->db->where('itmFact',$id);
        $query=$this->db->get('oitm');
        if ($query->num_rows()>0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}