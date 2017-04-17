<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sending extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_send');
		$this->load->model('Model_customers');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index(){
		redirect('sending/view','refresh');
	}
	public function mail($code, $visto, $web){
		$code = $this->Model_send->find($code);
		if ($code) {
			$this->Model_send->insert_info($code->code, $visto, $web);
			if ($web == 1) {
				$url = base_url();
				//redirect($url);
				redirect('http://www.infoplan.cl/forestal');
			}
			$this->output->set_content_type('jpeg')->set_output(file_get_contents(base_url('public/img/img_fondo.jpg')));				
		}else{
			echo '<strong>Código invalido.</strong>';
		}
	}
	public function view(){
		if ($this->session->userdata('nombre')){
		$data['contenido'] = 'email/view';
		$data['query1'] = $this->Model_send->all('send');
		$data['query2'] = $this->Model_send->get_mail_info();
		$this->load->view('template', $data);
		}else{
			redirect('login','refresh');
		}
	}	
	public function create(){
		if ($this->session->userdata('nombre')){
			$data['contenido'] = 'email/create';
			$data['code'] = md5(date('Y-m-d H:i:s'));
			$this->load->view('template', $data);
		}else{
			redirect('login','refresh');
		}
	}
	public function createcustomers($id){
		if ($this->session->userdata('nombre')){
			$data['contenido'] = 'email/customers';
			$data['code'] = md5(date('Y-m-d H:i:s'));
			$customer = $this->Model_customers->find($id);
			$data['send_mail'] = $customer->mail;
			$this->load->view('template', $data);
		}else{
			redirect('login','refresh');
		}
	}	
	public function insert(){
		$email = $this->input->post('email');
		$code = $this->input->post('code');
		$this->form_validation->set_rules('email', '"Mail"', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->create();
        }
        else{
        	$this->Model_send->insert($email, $code);
        	$this->email_format($email, $code);
			redirect('sending/view');
        }
	}
	public function delete($id){
		$this->Model_send->delete($id);
		redirect('sending/view');		
	}
	public function deleteinfo($id){
		$this->Model_send->deleteinfo($id);
		redirect('sending/view');		
	}
	public function email_format($email, $code){
		$view_email = base_url('sending/mail/'.$code.'/1/0');
		$wweb_email = base_url('sending/mail/'.$code.'/1/1');

		$config['protocol'] = 'mail';
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from('contacto@infoplan.cl', 'Infoplan MyAPP');
		$this->email->to($email);
		$this->email->subject('Gestion Control Máquinas');
   
        $this->email->message('<html lang="es">
 				<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
			    <meta name="viewport" content="width=device-width">
			    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <meta name="x-apple-disable-message-reformatting">
			    <title></title> 
			    <!--[if mso]>
			        <style>
			            * {
			                font-family: sans-serif !important;
			            }
			        </style>
			    <![endif]-->

			    <!--[if !mso]><!-->
			        
			    <!--<![endif]-->

			    <!-- Web Font / @font-face : END -->

				<!-- CSS Reset -->
			    <style>
			        html,
			        body {
			            margin: 0 auto !important;
			            padding: 0 !important;
			            height: 100% !important;
			            width: 100% !important;
			        }
			        * {
			            -ms-text-size-adjust: 100%;
			            -webkit-text-size-adjust: 100%;
			        }
			        div[style*="margin: 16px 0"] {
			            margin:0 !important;
			        }
			        table,
			        td {
			            mso-table-lspace: 0pt !important;
			            mso-table-rspace: 0pt !important;
			        }
			        table {
			            border-spacing: 0 !important;
			            border-collapse: collapse !important;
			            table-layout: fixed !important;
			            margin: 0 auto !important;
			        }
			        table table table {
			            table-layout: auto;
			        }
			        img {
			            -ms-interpolation-mode:bicubic;
			        }
			        *[x-apple-data-detectors] {
			            color: inherit !important;
			            text-decoration: none !important;
			        }
			        .x-gmail-data-detectors,
			        .x-gmail-data-detectors *,
			        .aBn {
			            border-bottom: 0 !important;
			            cursor: default !important;
			        }
			        .a6S {
				        display: none !important;
				        opacity: 0.01 !important;
			        }
			        img.g-img + div {
				        display:none !important;
				   	}
			        .button-link {
			            text-decoration: none !important;
			        }
			        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { 
			            .email-container {
			                min-width: 375px !important;
			            }
			        }
			    </style>
			    <style>
			        .button-td,
			        .button-a {
			            transition: all 100ms ease-in;
			        }
			        .button-td:hover,
			        .button-a:hover {
			            background: #555555 !important;
			            border-color: #555555 !important;
			        }
			    </style>
			    </head>
						<body width="100%" bgcolor="#222222" style="margin: 0; mso-line-height-rule: exactly;">
						    <center style="width: 100%; background: #e1e1e1; text-align: left;">
						        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
						            (Optional) This text will appear in the inbox preview, but not the email body.
						        </div>

						        <div style="max-width: 600px; margin: auto;" class="email-container">
						            <!--[if mso]>
						            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
						            <tr>
						            <td>
						            <![endif]-->

						            <!-- Email Header : BEGIN -->
						            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
						                <tr style="padding: 0 0 0 0; background-color: #FFFFFF; height: 60px;">
						                    <td width="70%" style="text-align: left; font-family: sans-serif; line-height: 20px; padding-left: 5px;">
						                    <!--Titulo-->
						                        <strong style="font-size: 24px; color:#555555;">Lorem ipsum. </strong>
						                        <span style="font-size: 20px; color:#555555;">consectetur adipisicing</span></p>
						                    </td>						                
						                    <td width="30%" style="text-align: right; padding-right: 5px;">
						                    	<!--redes sociales-->
						                        <img src="'.base_url('public/img/img_fb.png').'" width="30" aria-hidden="true" alt="alt_text" border="0">
						                        <img src="'.base_url('public/img/img_twitter.png').'" width="30" aria-hidden="true" alt="alt_text" border="0">
						                        <img src="'.base_url('public/img/img_linkedin.png').'" width="30" aria-hidden="true" alt="alt_text" border="0">
						                    </td>
						                </tr>						                
						                <tr>
						                    <td style="padding: 0 0 0 0; text-align: center">
						                        <img src="'.$view_email.'" aria-hidden="true" alt="alt_text" border="0" style="height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                        
						                    </td>
						                </tr>
						            </table>
						            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
						                <tr>
						                    <td bgcolor="#ffffff">

						                    </td>
						                </tr>
						                <tr>
						                    <td bgcolor="#ffffff">
						                        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
						                            <tr>
						                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						                                    <br><br>
						                                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
						                                        <tr>
						                                            <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
						                                                <a href="'.$wweb_email.'" style="background: #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
						                                                    <span style="color:#ffffff;" class="button-link">M&aacute;s informaci&oacute;n</span>
						                                                </a>
						                                            </td>
						                                        </tr>
						                                    </table>
						                                    <br>
						                                    <!--Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat.-->
						                                </td>
						                                </tr>
						                        </table>
						                    </td>
						                </tr>
						                <tr>
											<td style="padding: 0 0 0 0; text-align: center">
						                        <img src="http://placehold.it/600x250" aria-hidden="true" alt="alt_text" border="0" style="height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                        
						                    </td>
						                </tr>
						                <tr>
						                    <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%" style="padding-bottom: 40px; padding-top: 10px;">
						                        <table role="presentation" aria-hidden="true" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:560px;">
						                            <tr>
						                                <td align="center" valign="top" width="50%">
						                                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
						                                        <tr>
						                                            <td style="text-align: center; padding: 0 10px;">
						                                                <img src="http://placehold.it/200" aria-hidden="true" width="200" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 200px; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                                            </td>
						                                        </tr>
						                                        <tr>
						                                            <td style="text-align: center;font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px 10px 0;" class="stack-column-center">
						                                                Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora per conubia nostra, per torquent inceptos&nbsp;himenaeos.
						                                            </td>
						                                        </tr>
						                                    </table>
						                                </td>						                            
						                                <td align="center" valign="top" width="50%">
						                                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
						                                        <tr>
						                                            <td style="text-align: center; padding: 0 10px;">
						                                                <img src="http://placehold.it/200" aria-hidden="true" width="200" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 200px; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                                            </td>
						                                        </tr>
						                                        <tr>
						                                            <td style="text-align: center;font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px 10px 0;" class="stack-column-center">
						                                                Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora per conubia nostra, per torquent inceptos&nbsp;himenaeos.
						                                            </td>
						                                        </tr>
						                                    </table>
						                                </td>
						                                <td align="center" valign="top" width="50%">
						                                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
						                                        <tr>
						                                            <td style="text-align: center; padding: 0 10px;">
						                                                <img src="http://placehold.it/200" aria-hidden="true" width="200" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 200px; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                                            </td>
						                                        </tr>
						                                        <tr>
						                                            <td style="text-align: center;font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px 10px 0;" class="stack-column-center">
						                                                Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora per conubia nostra, per torquent inceptos&nbsp;himenaeos.
						                                            </td>
						                                        </tr>
						                                    </table>
						                                </td>
						                            </tr>
						                        </table>
						                    </td>
						                </tr>
						                <tr>
						                    <td height="40" style="font-size: 0; line-height: 0;">
						                        &nbsp;
						                    </td>
						                </tr>
						                <tr>
						                    <td bgcolor="#ffffff">
						                        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
						                            <tr>
						                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						                                    Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat.
						                                </td>
						                                </tr>
						                        </table>
						                    </td>
						                </tr>
						            </table>
						            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
						                <tr>
						                    <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
						                        <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">Visita nuestra web</webversion>
						                        <br><br>
						                        www.infoplan.cl<br> Regi&oacute;n de los R&iacute;os, Valdivia<br>+56 9 7970 9153
						                        <br><br>
						                        <unsubscribe style="color:#888888; text-decoration:underline;"><a href="'.$wweb_email.'">www.infoplan.cl/forestal</a></unsubscribe>
						                    </td>
						                </tr>
						            </table>
						        </div>
						    </center>
						</body>
						</html>');
					

        $this->email->send();
		if(!$this->email->send()){
			echo 'error envio';
		}else{
			echo 'sent';
		}
	}
}