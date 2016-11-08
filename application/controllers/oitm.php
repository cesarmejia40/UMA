<?php
class Oitm extends CI_Controller{
	public function __construct(){
        parent::__construct();
		
		
    }
	public function master(){
		$this->load->view('templates/header_home_admin');		
		$data['Clientes'] = $this->itm1->MtPts();
        $this->load->view('admin/master_view', $data);
        $this->load->view('templates/footer_admin');
	}
	public function AnularFactura(){
		$this->oitm->AnularCompleto($this->input->post('why'),$this->input->post('NFact'));
	}
	public function AnularParcial(){
		$this->oitm->AnularParcial($this->input->post('why'),$this->input->post('id'));
	}
	public function AnularTotal($razon , $id){
		$codID= str_replace("%20", " ", $id);
		$reason = str_replace("%20", " ", $razon);
		$data= $this->itm1->AnularTotal($reason ,$codID);
		echo json_encode($data);
	}
	public function facturas(){

		$this->load->view('templates/header_home_admin');
		$data['Segmento']=$this->uri->segment(3);
		if (!$data['Segmento']) {
			//$this->load->view('admin/menu_infoCliente_view');
			//$this->load->view('admin/factura_view');
		} else {
			$data['ClFact'] = $this->itm1->MtFactPts($data['Segmento']);
			$dataCls['ClsInfo'] = $this->itm1->InfoCls($data['Segmento']);
			$dataCls['Modulo'] = array('FACTURA');
			$this->load->view('admin/menu_infoCliente_view',$dataCls);
			$this->load->view('admin/factura_view',$data);
		}

		$this->load->view('templates/footer_admin');
	}
	public function detalle(){
		$this->load->view('templates/header_home_admin');
		$data['Segmento']=$this->uri->segment(3);
		if (!$data['Segmento']) {
			//$this->load->view('admin/menu_infoCliente_view');
			//$this->load->view('admin/factura_detalle_view');
		} else {

			$data['ClsInfo'] = $this->itm1->InfClsDetalle($data['Segmento']);
			$data['Modulo'] = array('');
			$dataFact['ClFactDetalle'] = $this->itm1->MtFactPtsDetalle($data['Segmento']);

			$this->load->view('admin/menu_infoCliente_view',$data);
			$this->load->view('admin/factura_detalle_view',$dataFact);
		}


		$this->load->view('templates/footer_admin');
	}
}