<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 02/12/2015
 * Time: 03:39 PM
 */
class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }
    public function index(){
        $data['clientes'] = $this->clientes->clientes();
        $this->load->view('templates/header_home_admin');
        $this->load->view('admin/master_usuario_view', $data);
        $this->load->view('templates/footer_admin');
    }
    public function agregar_cliente(){    
        $data = $this->clientes->vendedores();
        //print_r($data);
        $this->load->view('templates/header_home_admin');
        $this->load->view('admin/agregar_cliente_view',$data);
        $this->load->view('templates/footer_admin');
    }
    public function save_cliente(){

       $this->form_validation->set_rules('user', 'Usuario', 'required');
       $this->form_validation->set_rules('pass', 'Contraseña', 'required');
       $this->form_validation->set_rules('privilegio', 'Rol', 'required');
        if ($this->form_validation->run())
        {
            $slpId= $this->input->post('vendedor');

            $user= $this->input->post('user');
            $slpcodname= $this->input->post('nomvendedor');
            $pass= $this->input->post('pass');
            $privilegio= $this->input->post('privilegio');
            if($this->input->post('activo') && $this->input->post('activo') != false){
                $activo= 'Y';
            }
            else{
            $activo = 'N';
            }
            $data= $this->clientes->save($slpId, $user, $slpcodname, $pass, $privilegio, $activo);
                if($data){
                    $this->index();
                }
                //echo "Error";

            /*    $data= array(
                    'Usuario' => $user,
                    'Contraseña' => $pass,
                    'Rol' => $privilegio,
                    'Activo' => $activo
                );
                echo json_ende($data);*/

        }
        else{
            $this->agregar_cliente();
        }

    }
    public function eliminar_cliente($cod){
           $data = $this->clientes->del($cod);
            if($data){
                $this->index();
            }
        echo "Error";
    }
}