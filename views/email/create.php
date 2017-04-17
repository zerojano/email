<?php
    $email  =   array('maxlength'=>'100','type'=>'email','name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Ingresar mail usuario','value'=>set_value('email'));
    $submit =   array('type'=>'submit','content'=>'<i class="glyphicon glyphicon-plus"></i> Ingresar','name'=>'registro','id'=>'registro','class'=>'btn btn-success',);
?>
<div class="col-md-12" style="margin-bottom: 100px;">
    <?=form_open('sending/insert'); ?>
    	<?= form_hidden('code', $code); ?>
        <div class="form-group col-md-12">
            <?=form_label('Mail', 'mail'); ?>
            <?=form_input($email);?>
        </div>
        <div class="form-actions col-md-12">
            <?=form_button($submit);?>
        </div>
    <?=form_close();?>
</div>