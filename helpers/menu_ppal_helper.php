<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu_ppal')){
	function menu_ppal(){
		$CI =& get_instance();
		if (get_instance()->session->userdata('id')) {
			//$opciones = '<li>'.anchor('inicio', 'Inicio').'</li>';
			$opciones = '<li>'.anchor('customers/view', 'Clientes').'</li>';
			$opciones = $opciones.'<li>'.anchor('sending/view', 'Estadisticas').'</li>';
			$opciones = $opciones.'<li>'.anchor('sending/create', 'Enviar').'</li>';
			/*$opciones = $opciones.'<li>
									    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
									    	<span aria-hidden="true"></span> Usuarios <span class="caret"></span>
									    </a>
										<ul class="dropdown-menu">
											<li>'.anchor('usuarios/view',' Ver usuarios').'</li>
											<li>'.anchor('usuarios/create',' Crear usuario').'</li>
										</ul>
									</li>';*/
		}else{
			$opciones = $opciones.'<li>'.anchor('login/ingreso', 'Login').'</li>';
		}
		return $opciones;
	}
}
