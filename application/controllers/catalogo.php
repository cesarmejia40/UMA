<?php
/**
 * User: A7M
 * Date: 08/12/2015
 * Time: 16:16
 */
class Catalogo extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view('templates/header_home_admin');        
        $data['mtct'] = $this->catalogos->mtct();
        $cont = 0;

        foreach ($data['mtct']->result_array() as $key) {
            $cont = $cont+1;
        }      
        $val1 = round($cont/4);         
        
        $data['mtct1'] = $this->catalogos->mtct1($val1, 0);
        $data['mtct2'] = $this->catalogos->mtct1($val1, $val1);
        $data['mtct3'] = $this->catalogos->mtct1($val1, $val1*2);
        $data['mtct4'] = $this->catalogos->mtct1($cont, $val1*3);       
        
        $this->load->view('admin/catalogo_view',$data);

        $this->load->view('templates/footer_admin');
    }
    public function saveproduct(){

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1024';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('txtcod', 'Codigo', 'required');
        $this->form_validation->set_rules('txtName', 'Nombre', 'required');
        $this->form_validation->set_rules('txtPts', 'Puntos', 'required|is_natural_no_zero');
        if (empty($_FILES['userfile']['name'])){
            $this->form_validation->set_rules('upload', 'de la imagen ', 'required');		}
        if ($this->form_validation->run() == FALSE){
            //$this->load->view('myform');
            $this->index();
        }else{
            if (!$this->upload->do_upload('userfile')){
                echo $this->upload->display_errors();
            }else{
                $upload_data = $this->upload->data();
                $this->catalogos->SaveProducto($upload_data['file_name'],$this->input->post('txtName'),$this->input->post('txtPts'),$this->input->post('txtcod'));
                redirect(base_url().'index.php/catalogo','refresh');
            }
        }
    }
    public function EditarProduct(){
        $this->load->view('templates/header_home_admin');
        $data['GetProduct'] = $this->catalogos->GetProducto($this->uri->segment(3));
        $this->load->view('admin/catalogo_edit_view.php',$data);
        $this->load->view('templates/footer_admin');
    }
    public function EliminarProduct(){
        $data['Segmento']=$this->uri->segment(3);
        $this->catalogos->EliminarProduct($data['Segmento']);
        redirect(base_url().'index.php/catalogo','refresh');
    }

    public function actualizarproduct(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload', $config);
        $data['Segmento']=$this->uri->segment(3);


        if (!$this->upload->do_upload('userfile')){                        
            $imge = $this->input->post('ImgUpdate');
        }else{            
            $upload_data = $this->upload->data();            
            $imge = $upload_data['file_name'];
        }


        $this->catalogos->UpdatProducto($this->input->post('txtName'),$this->input->post('txtPts'),$data['Segmento'],$imge,$this->input->post('txtcod'));
        redirect(base_url().'index.php/catalogo','refresh');

    }


}