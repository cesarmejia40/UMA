<?php
class itm1 extends CI_Model{
	function __contruct(){
		parent::__contruct();
		$this->load->database();
	}
	function MtPts(){
		$user = $this->session->userdata('idUser');
		$misClientes = "";
		if ($this->session->userdata('Acceso') == "4") {
			$query = $this->db->query("SELECT SlpID FROM oslp WHERE SlpCode ='".$user."'");
			if ($query->num_rows()>0) {
					$Array = $this->sqlsrv -> fetchArray("SELECT CLIENTE FROM Softland.umaagro.CLIENTE 
															WHERE VENDEDOR = '".$query->result_array()[0]['SlpID']."'",SQLSRV_FETCH_ASSOC);
				        $json = array();
				        $i=0;
				        foreach ($Array as $fila) {
				        	$misClientes .= "'".$fila['CLIENTE']."',";
				             $i++;
				        }
				        $this->sqlsrv->close();
				        //echo substr($misClientes,0,-1);
				}
				
				
			$query = $this->db->query("SELECT SUM(itmPts) as itmPts,itmCls,itmClsName 
										FROM view_admin_mtpts WHERE itmCls in (".substr($misClientes,0,-1).")
										GROUP BY itmCls");
		}else{
			$this->db->select_sum('itmPts');
			$this->db->select('itmCls, itmClsName, ');
			$this->db->group_by("itmCls");
			$query = $this->db->get('view_admin_mtpts');
		}
		if ($query->num_rows()>0) {
			return $query;
		} else {
			return false;
		}
	}
	function MtFactPts($id){
		$this->db->where('itmCls',base64_decode($id));
		$this->db->where('ItmStus >',0);
		$query=$this->db->get('view_admin_mtpts');
		if ($query->num_rows()>0) {
			return $query;
		} else {
			return false;
		}
	}
	function MtFactPtsDetalle($id){
		$this->db->where('itmFact',$id);
		$this->db->where('ItmStus =',1);
		$query=$this->db->get('oitm');
		if ($query->num_rows()>0) {
			return $query;
		} else {
			return false;
		}
	}
	function InfoCls($id){
		$this->db->where('itmCls',base64_decode($id));
		$this->db->group_by("itmCls");
		$query=$this->db->get('oitm');
		if ($query->num_rows()>0) {
			return $query;
		} else {
			return false;
		}
	}
	function InfClsDetalle($id){
		$this->db->where('itmFact',$id);

		$this->db->group_by("itmFact");
		$query=$this->db->get('oitm');

		if ($query->num_rows()>0) {
			return $query;
		} else {
			return false;
		}
	}
	function AnularCompleto($why,$Fct){
		$data = array(
				'ItmStus' => 3,
				'ItmWhy' => $why,
				'ItmWhyMod' => "AFC",
				'itmAudi' => $this->session->userdata("username").'-'.date("Y-m-d H:i:s")
		);
		$this->db->where('ItmWhyMod', ' ');
		$this->db->where('itmFact', $Fct);
		$this->db->update('oitm', $data);

	}
	function AnularParcial($why,$id){
		$data = array(
				'ItmStus' => 4,
				'ItmWhy' => $why,
				'ItmWhyMod' => "AFP",
				'itmAudi' => $this->session->userdata('username').'-'.date('Y-m-d H:i:s')
		);
		$this->db->where('itmk', $id);
		$this->db->update('oitm', $data);

	}
	function AnularTotal($razon,$id){
		$data = array(
				'ItmStus' => 2,
				'ItmWhy' => $razon,
				'ItmWhyMod' => "ACC",
				'itmAudi' => $this->session->userdata('username').'-'.date('Y-m-d H:i:s')
		);
		$this->db->where('itmCls', $id);
		$update= $this->db->update('oitm', $data);
		if($update){
			return 1;
		}
		return 0;
	}
	function TOP($id){

	$this->db->limit(5);
	$this->db->order_by("itmPts", "desc");
	$this->db->where('itmCls',$id);

	$query=$this->db->get('view_admin_mtpts');

	if ($query->num_rows()>0) {
	return $query;
	} else {
	return false;
	}
	}
	function TODASLASFACTURAS($id){		
		$this->db->order_by("itmPts", "desc");
		$this->db->where('itmCls',$id);		
		$query=$this->db->get('view_admin_mtpts');		
		if ($query->num_rows()>0) {
			return  $query->result_array();
		} else {
			return NULL;
		}
	}
	function indicadores($id){
		$this->db->where('itmCls',$id);
		$query=$this->db->get('view_indicadores');
		if ($query->num_rows()>0) {
			return $query->result_array();
		} else {
			return false; 
		}
	}

}