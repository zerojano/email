<div class="col-md-12"  style="height: auto;">
  <div style="margin-bottom: 50px;">  
    <legend class="col-xs-12 col-md-12">Enviados</legend>
    <table class="table table-hover" width="100%">
    <thead>
      <tr>
        <td><h5><strong>Mail</strong></h5></td>
        <td class="hidden-xs"><h5><strong>Code</strong></h5></td>
        <td><h5><strong>Enviado</strong></h5></td>
        <td><h5><strong>Opci&oacute;n</strong></h5></td>
      </tr>
      </thead>
      <tbody>
        <?php
        if (empty($query1)){
          echo '<tr><td colspan ="5" style="text-align:center;">No existen registros</td></tr>';
        }
        foreach ($query1 as $registro){
        ?>
        <tr>
          <td><?= $registro->mail  ?></td>
          <td class="hidden-xs"><?= $registro->code  ?></td>
          <td><?=date('d/m/Y H:i:s',strtotime($registro->create_date)).'<div class="hidden-xs"> Hrs.</div>'?></td>
          <td>
            <?=anchor('sending/delete/'.$registro->id,'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <span class="hidden-xs">Quitar todo</span>', array('class'=>'btn btn-danger btn-xs'));?>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12"  style="height: auto;">
  <legend class="col-xs-12 col-md-12">Accesos</legend>
  <div style="margin-bottom: 50px;">
    <table class="table table-hover" width="100%">
    <thead>
      <tr>
        <td><h5><strong>Email</strong></h5></td>
        <td><h5><strong>Code</strong></h5></td>
        <td><h5><strong>Habierto</strong></h5></td>
        <td><h5><strong>WWW Vista</strong></h5></td>
        <td><h5><strong>visto</strong></h5></td>
        <td><h5><strong>Opci&oacute;n</strong></h5></td>
      </tr>
      </thead>
      <tbody>
        <?php
        if (empty($query2)){
          echo '<tr><td colspan ="5" style="text-align:center;">No existen registros</td></tr>';
        }
        foreach ($query2 as $registro){
        ?>
        <tr>
          <td><?= $registro->mail  ?></td>
          <td><?= $registro->code  ?></td>
          <td><?= $registro->email_visto  ?></td>
          <td><?= $registro->email_link_web  ?></td>
          <td><?=date('d/m/Y H:i:s',strtotime($registro->create_date)).' Hrs.'?></td>
          <td>
            <?=anchor('sending/deleteinfo/'.$registro->id,'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <span class="hidden-xs">Quitar</span>', array('class'=>'btn btn-danger btn-xs'));?>
          </td>          
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>