<?php


class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function login($name = FALSE, $pass = FALSE){
        if($name != FALSE && $pass != FALSE){

            $this->db->where('SlpName', $name);
            $this->db->where('SlpPassword', $pass);
            $query = $this->db->get('oslp');
            if($query->num_rows() == 1){
                return $query->result_array();
            }
            return 0;
        }
    }
}