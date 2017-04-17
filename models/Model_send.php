<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_send extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function all($tipo){
		if ($tipo == 'send'){
			$tabla = "send";
		}else{
			$tabla = "send_info";
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get($tabla);
		return $query->result();
	}
	function find($code){
		$this->db->where('code', $code);
		return $this->db->get('send')->row();
	}
	function insert($email, $code){
        $data = array(
        	'mail'			=> $email,
            'code'			=> $code,
            'create_date'	=> date('Y-m-d H:i:s'),
            'edit_date'		=> date('Y-m-d H:i:s'),
        	);
        $this->db->insert('send',$data);
	}
	function insert_info($code, $visto, $web){
        $data = array(
            'code'			=> $code,
            'email_visto'	=> $visto,
            'email_link_web'=> $web,
            'create_date'	=> date('Y-m-d H:i:s'),
            'edit_date'		=> date('Y-m-d H:i:s'),
        	);
        $this->db->insert('send_info',$data);
	}
	function get_mail_info(){
		$this->db->select('send.mail, send.code, send_info.id, send_info.email_visto, send_info.email_link_web, send_info.create_date');
		$this->db->from('send');
		$this->db->join('send_info', 'send.code = send_info.code' );
		$this->db->order_by('send_info.id','DESC');
		//$this->db->limit(15, 20);
		$query = $this->db->get();
		return $query->result();		
	}
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('send');
	}
	function deleteinfo($id){
		$this->db->where('id', $id);
		$this->db->delete('send_info');
	}
}