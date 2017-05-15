<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 24/11/2015
 * Time: 03:10 PM
 */
class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function principal(){
        $this->load->view('templates/header_home');
        $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
        $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
        $this->load->view('pages/menu_view',$Top);
        $this->load->view('pages/principal_view');
        $data['cat'] = $this->catalogos->AllClPro();        
        $this->load->view('pages/catalogo_view', $data);
        $this->load->view('templates/footer');
    }
    public function cuenta(){
        $this->load->view('templates/header_home');
        $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
        $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
        $this->load->view('pages/menu_view',$Top);
        $this->load->view('pages/cuenta_view');                
        $data['cat'] = $this->catalogos->AllClPro();        
        $this->load->view('pages/catalogo_view', $data);
        $this->load->view('templates/footer');
    }
    public function estadocuenta(){

       $this->clientes->StatusFact($this->session->userdata('idCliente'),$this->input->get_post('D1'),$this->input->get_post('D2'));
    }

     public function ultimospagos(){        
        $Strg=""; $cant=0;        
        $Top['listatop'] = $this->itm1->TODASLASFACTURAS($this->session->userdata('idCliente'));
        $cant = count($Top['listatop']);
        
        if ($cant==0 || $cant == NULL) {
            $this->clientes->registroVacio();
        } else {
            foreach ($Top['listatop'] as $row){
                $Strg .= "'".$row['itmFact']."',";                
            }
            $Strg = substr($Strg, 0,-1);               
            $this->clientes->lastPagos($Strg);   
        }
    }

    public function bouchers(){
        $this->load->view('templates/header_home');
        $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));

        $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
        $this->load->view('pages/menu_view',$Top);
        $Facturas['listafacturas'] = $this->itm1->MtFactPts(base64_encode($this->session->userdata('idCliente')));
        $this->load->view('pages/bouchers_view',$Facturas);
        $data['cat'] = $this->catalogos->AllClPro();
        $this->load->view('pages/catalogo_view', $data);
        $this->load->view('templates/footer');
    }
    public function pagos(){
        $this->load->view('templates/header_home');        
        //$Top['listatop'] = $this->itm1->TOP($idClientee);
        //$Top['listindica'] = $this->itm1->indicadores($idClientee);
        $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
        $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
        
        $this->load->view('pages/menu_view',$Top);
        $this->load->view('pages/pagos_view');
        $data['cat'] = $this->catalogos->AllClPro();        
        $this->load->view('pages/catalogo_view', $data);
        $this->load->view('templates/footer');

    }
    public function factura(){
        $this->load->view('templates/header_home');
        $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
        $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
        $this->load->view('pages/menu_view',$Top);        
        $dataui['uidetalle'] = $this->catalogos->UiFactDetalle($this->uri->segment(2));
        $dataui['txtFecha'] = $dataui['uidetalle'][0]['itmDate'];
        $dataui['txtFactura'] = $dataui['uidetalle'][0]['itmFact'];
        $dataui['txtCliente'] = $dataui['uidetalle'][0]['itmCls'];
        $this->load->view('pages/factura_view',$dataui);
        $data['cat'] = $this->catalogos->AllClPro();        
        $this->load->view('pages/catalogo_view', $data);
        $this->load->view('templates/footer');
    }
}