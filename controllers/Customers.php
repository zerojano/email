<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_send');
		$this->load->model('Model_customers');
		$this->load->model('Model_customers_disabled');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index(){
		redirect('customers/view','refresh');
	}
	public function view(){
		if ($this->session->userdata('nombre')){
			$data['contenido'] = 'customers/view';
			$data['query'] = $this->Model_customers->all();
			$this->load->view('template', $data);
		}else{
			redirect('login','refresh');
		}
	}
	public function create(){
		if ($this->session->userdata('nombre')){
			$data['contenido'] = 'customers/create';
			$data['code'] = md5(date('Y-m-d H:i:s'));
			$this->load->view('template', $data);
		}else{
			redirect('login','refresh');
		}
	}
	public function insert(){
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$localidad = $this->input->post('localidad');
		$this->form_validation->set_rules('nombre', '"Nombre"', 'required');
		$this->form_validation->set_rules('email', '"Mail"', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->create();
        }
        else{
        	$this->Model_customers->insert($nombre, $email, $localidad);
			redirect('customers/view');
        }
	}
	public function disabled($id){
		/*quitar del listado de envios*/
		$this->Model_customers_disabled->insert($id);
		echo 'Se quito!!';
	}
}