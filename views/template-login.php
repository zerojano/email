<?php
header("Expires: Thu, 12 Dic 1981 08:34:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?= base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
	<script type="text/javascript" src="<?=base_url('public/js/jquery-2.1.4.min.js')?>"></script>
	<!--lib input upload-->
	<link href="<?=base_url('public/js/input-upload/css/fileinput.css')?>" media="all" rel="stylesheet" type="text/css" />
	<script src="<?=base_url('public/js/input-upload/js/fileinput.js')?>" type="text/javascript"></script>
	<script src="<?=base_url('public/js/input-upload/js/fileinput_locale_fr.js')?>" type="text/javascript"></script>
	<script src="<?=base_url('public/js/input-upload/js/fileinput_locale_es.js')?>" type="text/javascript"></script>
	<style type="text/css">
		.vertical-offset-100{
		    padding-top:100px;
		}
	</style>

	<title> UACh Lugares </title>
</head>
<body>
	<?php 
		$this->load->view($contenido); 
	?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!--ckeditor-->
 	<script type="text/javascript" src="<?=base_url('public/js/ckeditor/ckeditor.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/ckeditor/adapters/jquery.js')?>"></script>
</body>
</html>
