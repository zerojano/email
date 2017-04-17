<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class usuarioLib{
	public function __construct($config = array()){
		$this->CI =& get_instance();
		$this->CI->load->model('Model_usuarios');
	}
	public function login($user, $pass){
		$query = $this->CI->Model_usuarios->get_login($user, $pass);
		if($query->num_rows() > 0){
			$usuario = $query->row();
			$datosSession = array(	'id' => $usuario->id,
									'user' => $usuario->usuario,
									'nombre' => $usuario->nombre,
									'apellido' => $usuario->apellido);
			$this->CI->session->set_userdata($datosSession);
			return TRUE;
		}
		else{
			log_message('error', 'Usuario o clave erronea.');
			$this->CI->session->sess_destroy();
			return FALSE;
		}
	}
    public function cambiarPWD($act, $new){
        if($this->CI->session->userdata('id') == null){
            return FALSE;
        }
         $id = $this->CI->session->userdata('id');
        $usuario = $this->CI->Model_Usuario->find($id);
        if($usuario->password == $act){
            $data = array('id' => $id,
                          'password' => $new);
            $this->CI->Model_Usuario->update($data);
        }
        else{
            return FALSE;
        }
    }	
}