<div class="col-md-12"  style="height: auto;">
  <div style="margin-bottom: 50px;">  
    <legend class="col-xs-12 col-md-12">Clientes</legend>
    <table class="table table-hover" width="100%">
    <thead>
      <tr>
        <td><h5><strong>Empresa</strong></h5></td>
        <td><h5><strong>Email</strong></h5></td>
        <td><h5><strong>Localidad</strong></h5></td>
        <!--<td><h5><strong>Ingreso</strong></h5></td>-->
        <td><h5><strong>Eventos</strong></h5></td>
        <td><h5><strong>Opci&oacute;n</strong></h5></td>
      </tr>
      </thead>
      <tbody>
        <?php
        if (empty($query)){
          echo '<tr><td colspan ="5" style="text-align:center;">No existen registros</td></tr>';
        }
        foreach ($query as $registro){
        ?>
        <tr>
          <td><?= $registro->nombre  ?></td>
          <td><?= $registro->mail  ?></td>
          <td><?= $registro->localidad  ?></td>
          <!--<td><?=date('d/m/Y',strtotime($registro->create_date))?></td>-->
          <td>
          <?php 
            $enviados = 1;
            $vistos = 0;
            if ($enviados > 0){
              echo anchor('#','<span class="glyphicon glyphicon-send" aria-hidden="true"></span> <span class="hidden-xs">Enviado</span>', array('class'=>'btn btn-success btn-xs'));
            }else{
              echo anchor('#','<span class="glyphicon glyphicon-send" aria-hidden="true"></span> <span class="hidden-xs">NoEnviado</span>', array('class'=>'btn btn-warning btn-xs'));
            }
            if ($vistos > 0){
              echo anchor('#','<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <span class="hidden-xs">Visto</span>', array('class'=>'btn btn-success btn-xs'));
            }else{
              echo anchor('#','<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> <span class="hidden-xs">Visto</span>', array('class'=>'btn btn-warning btn-xs'));
            }
          ?>
          </td>
          <td>
            <?=anchor('sending/delete/'.$registro->id,'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <span class="hidden-xs">Quitar</span>', array('class'=>'btn btn-danger btn-xs'));?>
            <?=anchor('sending/createcustomers/'.$registro->id,'<span class="glyphicon glyphicon-send" aria-hidden="true"></span> <span class="hidden-xs">Enviar</span>', array('class'=>'btn btn-primary btn-xs'));?>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>