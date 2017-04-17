<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_usuarios extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function get_login($user, $pass){
		$this->db->where('usuario', $user);
		$this->db->where('clave', md5( $pass ) );
		return $this->db->get('user');
	}
    function validate_pass($pass){
        $this->db->where( 'clave' , $pass );
        $this->db->where( 'id' , $this->session->userdata('id'));
        $consulta = $this->db->get('user');
		
		if($consulta->num_rows() == 1){
	        $row = $consulta->row();
	        return $row->pass;
		}
    }    
}