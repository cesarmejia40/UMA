<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

    public function index($e = 1)
    {
      $data['user']=$e;
      
      if ($this->session->userdata('remember') == TRUE) {  
        if (($this->session->userdata('Acceso') == 1) || ($this->session->userdata('Acceso') == 2)) {
          $this->load->view('templates/header_home_admin');
          $data['Clientes'] = $this->itm1->MtPts();
          $this->load->view('admin/master_view', $data);
          $this->load->view('templates/footer_admin');
        } else {

          $this->load->view('templates/header_home');

          $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
          $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
          $this->load->view('pages/menu_view', $Top);
          $this->load->view('pages/principal_view');

          $data['cat'] = $this->catalogos->AllClPro();
          $this->load->view('pages/catalogo_view', $data);

          $this->load->view('templates/footer');
        }
      }else {
        $this->load->view('templates/header');
        $this->load->view('pages/login_view',$data);
        $this->load->view('templates/footer');               
      }

    }
    public function logueo(){
	 	$valorCheck = $this->input->post("checkRemember");
      $this->form_validation->set_rules('name', 'Usuario', 'required');
      $this->form_validation->set_rules('pass', 'Contraseña', 'required');
      $rememberLogin = FALSE;
      if ($this->form_validation->run()) {		
		
		if ($valorCheck == "on") {
			$rememberLogin = TRUE;			
		} else{
			$rememberLogin = FALSE;
		}

        $name = $this->input->get_post('name');
        $pass = $this->input->get_post('pass');
        $data['user'] = $this->user->login($name, MD5($pass));

        if ($data['user'] == 0) {
          $this->index($data['user']);                                                      
        } else {
          foreach ($data['user'] as $row) {
            $sessiondata = array(
              'username' => $row['SlpName'],
              'idUser' => $row['SlpCode'],
              'idCliente' => $row['SlpID'],
              'ClienteNombre' => $row['SlpCodCliente'],
              'Acceso' => $row['Privilegio'],
              'remember' => $rememberLogin,
              'logged' => TRUE
              );
            $this->session->set_userdata($sessiondata);

            if (($row['Privilegio'] == 1) || ($row['Privilegio'] == 2)) {
      
              $this->load->view('templates/header_home_admin');
              $data['Clientes'] = $this->itm1->MtPts();
              $this->load->view('admin/master_view', $data);
              $this->load->view('templates/footer_admin');
            } else {
              $this->load->view('templates/header_home');

              $Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
              $Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
              $this->load->view('pages/menu_view', $Top);
              $this->load->view('pages/principal_view');
              $data['cat'] = $this->catalogos->AllClPro();
              $this->load->view('pages/catalogo_view', $data);

              $this->load->view('templates/footer');
            }
          }
        }
      }
      else{

        $this->index();
      }
    }
	public function salir(){
			$sessiondata = array(
			'logged' => FALSE,
			'rememberLogin' => FALSE
			);
			$this->session->set_userdata($sessiondata);
			$this->session->sess_destroy();
			$this->index();		
	}

	public function cerrar() {
		$logeado = FALSE;
		$remeber1 = $this->session->userdata('remember');		
	
		if ($logeado == FALSE || $remeber1 == TRUE) {


		//Recordar contraseña. Metodos
		$valorCheck = $this->input->post("checkRemember");
		if ($valorCheck == "on" && $valorCheck != "") {
			echo "Se marco el chekc";
		} else if ($valorCheck != "on" || $valorCheck == "") {
			echo "No se marco el chekc";
		} 
		if ($this->form_validation->run()) {
			$name = $this->input->get_post('name');
			$pass = $this->input->get_post('pass');
			$data['user'] = $this->user->login($name, MD5($pass));
			//echo json_encode($data);
			if ($data['user'] == 0) {
				$this->index($data['user']);				
			} else {
				
				foreach ($data['user'] as $row) {
					$sessiondata = array(
							'username' => $row['SlpName'],
							'idUser' => $row['SlpCode'],
							'idCliente' => $row['SlpID'],
							'ClienteNombre' => $row['SlpCodCliente'],
							'Acceso' => $row['Privilegio'],
							'logged' => TRUE
					);
					$this->session->set_userdata($sessiondata);

					if (($row['Privilegio'] == 1) || ($row['Privilegio'] == 2)) {
						//$user['UserSession']= $this->session->userdata('username');
						$this->load->view('templates/header_home_admin');
						$data['Clientes'] = $this->itm1->MtPts();
						$this->load->view('admin/master_view', $data);
						$this->load->view('templates/footer_admin');
					} 
						elseif(($row['Privilegio'] == 4))
						{
						$this->load->view('templates/header_home_admin');
						$data['Clientes'] = $this->itm1->MtPts();
						$this->load->view('admin/master_view', $data);
						$this->load->view('templates/footer_admin');
						}
						else {
						$this->load->view('templates/header_home');

						$Top['listatop'] = $this->itm1->TOP($this->session->userdata('idCliente'));
						$Top['listindica'] = $this->itm1->indicadores($this->session->userdata('idCliente'));
						$this->load->view('pages/menu_view', $Top);
						$this->load->view('pages/principal_view');

						//$data['cat'] = $this->catalogos->AllClPro(intval($Top['listindica'][0]['Acumulado']));
						$data['cat'] = $this->catalogos->AllClPro();
						$this->load->view('pages/catalogo_view', $data);

						$this->load->view('templates/footer');
					}
				}
			}

		}
		elseif ($logeado == FALSE || $remeber1 == FALSE) {
			$this->session->set_userdata($sessiondata);
			$this->session->sess_destroy();
			$this->index();	
		}

	}	}
}

}
