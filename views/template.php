<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="aaguayo">
	<link href="<?= base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
	<link href="<?= base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" media="screen">
	<script type="text/javascript" src="<?=base_url('public/js/jquery-2.1.4.min.js')?>"></script>
	<title>test de envio</title>
</head>
<body>
	<header class="navbar navbar-default navbar-static-top" role="banner">
		<div class="container">
		    <div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand hidden-ms hidden-lg" style="color: #FFFFFF">Test</a>
				<div class="hidden-xs hidden-sm"></div>
		    </div>
		    <nav class="collapse navbar-collapse" role="navigation" style="background-color: #FFFFFF !important" >
		      	<ul class="nav navbar-nav" >
					<?php 
					if($this->session->userdata('nombre')){
						echo menu_ppal(); 
					}
					?>		
		     	</ul>
				<ul class="nav navbar-nav navbar-right" style="color: #FFFFFF">
					<li><?=anchor('login/salir', '<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Salir');?></li>
				</ul>
			</nav><!--.collapse-->
		</div>
	</header>
	<div class="container" style="display: block; height: 100%;">
		<div class="row">
			<?php
				$this->load->view($contenido); 
			?>
		</div>
	</div>
	<footer style="background-color:#787887; margin-bottom: 0" class="footer" role="banner">
		<div class="container">
			<a href="<?=base_url('');?>"></a>
		</div>
	</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
