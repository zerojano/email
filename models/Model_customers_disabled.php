<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customers_disabled extends CI_Model {
	function __construct() {
		parent::__construct();
		}	
	function all(){
		$query = $this->db->get('customers_disabled');
		return $query->result();
	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('customers_disabled')->row();
	}
	function insert($id){
        $data = array(
        	'id_mail'		=> $id,
            'create_date'	=> date('Y-m-d H:i:s'),
        	);
        $this->db->insert('customers_disabled',$data);
	}
}