<?php
class Pass extends CI_Controller{
                public function __construct(){
        parent::__construct();                         
    }

                public function updatepass()
                {

                               $query=$this->db->get('oslp');                                               

                               for ($i=0; $i <count($query->result_array()) ; $i++) { 
                                                               
                                               $passActual=$query->result_array[$i]['SlpPassword'];
                                               $id=$query->result_array[$i]['SlpID'];
                                               $data = array(
               'SlpPassword' => MD5($passActual)
            );
                                                               $this->db->where('SlpID', $id);
                                                               $this->db->update('oslp', $data);                                                          
                               }
                }

}
?>