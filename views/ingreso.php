
	<div class="container">
	    <div class="row vertical-offset-100">
	    	<div class="col-md-4 col-md-offset-4">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Administrador</h3>
				 	</div>
				  	<div class="panel-body">
				    	<?= form_open('login/ingresar'); ?>
	                    <fieldset>
							<div class="form-group">
						   		<?= form_label('Usuario :', 'login', array('class'=>'sr-only')); ?>
						   		<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						   			<?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login','class'=>'form-control', 'placeholder' => 'Usuario', 'value'=>set_value('login')));?>
						   		</div>
						  	</div>
						  	<div class="form-group">
						   		<?= form_label('Password :', 'password', array('class'=>'sr-only')); ?>
						   	<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						   		<?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password','class'=>'form-control',  'placeholder' => 'Clave', 'value'=>set_value('password')));?>
						   	</div><br>
				    		<?= form_button(array('type'=>'submit', 'content'=>'Ingresar', 'class'=>'btn btn-primary')); ?>
				    	</fieldset>
				      	<?= form_close(); ?>
				    </div>
				</div>
			</div>
		</div>
	</div>
