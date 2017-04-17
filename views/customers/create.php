<?php
    $nombre =   array('maxlength'=>'100','type'=>'text','name'=>'nombre','id'=>'nombre','class'=>'form-control','placeholder'=>'Ingresar nombre','value'=>set_value('nombre'));
    $email  =   array('maxlength'=>'100','type'=>'email','name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Ingresar mail usuario','value'=>set_value('email'));
    $localidad =   array('maxlength'=>'100','type'=>'text','name'=>'localidad','id'=>'localidad','class'=>'form-control','placeholder'=>'Ingresar localidad','value'=>set_value('localidad'));
    $submit =   array('type'=>'submit','content'=>'<i class="glyphicon glyphicon-plus"></i> Ingresar','name'=>'registro','id'=>'registro','class'=>'btn btn-success',);
?>
<div class="col-md-12" style="margin-bottom: 100px;">
    <?=form_open('sending/insert'); ?>
        <div class="form-group col-md-12">
            <?=form_label('Nombre Cliente', 'nombre'); ?>
            <?=form_input($nombre);?>
        </div>
        <div class="form-group col-md-12">
            <?=form_label('Mail', 'mail'); ?>
            <?=form_input($email);?>
        </div>
        <div class="form-group col-md-12">
            <?=form_label('Localidad', 'localidad'); ?>
            <?=form_input($localidad);?>
        </div>
        <div class="form-actions col-md-12">
            <?=form_button($submit);?>
        </div>
    <?=form_close();?>
</div>