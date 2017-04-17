<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('usuarioLib');
		$this->load->model('Model_usuarios');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('loginok', 'Usuario o contraseña incorrecta.');
		$this->form_validation->set_message('matches', '%s no coincide con %s');
		$this->form_validation->set_message('cambiook', 'No se puede realizar el cambio de clave');
	}
	public function index(){
		$data['contenido'] = 'ingreso';
		$data['titulo'] = 'Ingreso';
		$this->load->view('template-login', $data);
	}
	public function acceso_denegado(){
		$data['contenido'] = 'home/acceso_denegado';
		$data['titulo'] = 'Acceso denegado';
		$this->load->view('template', $data);
	}
	public function salir(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
	public function ingreso(){
		if( $this->session->userdata('id')){
			redirect('inicio');
		}
		else{
			$data['contenido'] = 'ingreso';
			$data['titulo'] = 'Ingreso';
			$this->load->view('template-login', $data);
		}
	}
	public function loginok(){
		$login=$this->input->post('login');
		$password=$this->input->post('password');
		return $this->usuariolib->login( $login , $password );
	}
	public function ingresar(){	 
		$this->form_validation->set_rules('login', 'Usuario', 'required|callback_loginok');
		$this->form_validation->set_rules('password', 'Clave', 'required');
		if($this->form_validation->run() == FALSE){
			$this->ingreso();
		}
		else{
			redirect('customers/view');
		}
	}
}