<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customers extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	
	function all(){
		$query = $this->db->get('customers');
		return $query->result();
	}
	/*
	function all(){
		$this->db->select('customers.id, customers.nombre, customers.mail, customers.localidad, customers.create_date, send.id as id_send');
		$this->db->from('customers');
		$this->db->join('send', 'send.mail = customers.mail');
		$query = $this->db->get();
		return $query->result();
	}
	*/
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('customers')->row();
	}
	function insert($nombre, $mail, $localidad){
        $data = array(
        	'nombre'		=> $nombre,
            'mail'			=> $mail,
            'localidad'		=> $localidad,
            'create_date'	=> date('Y-m-d H:i:s'),
        	);
        $this->db->insert('customers',$data);
	}
}

/* End of file Model_customers.php */
/* Location: ./application/models/Model_customers.php */