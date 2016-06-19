<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content')?>
<h1>Tous les Inventaires</h1>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>character_id</th>
      <th>object_id</th>
      <th>amount</th><!-- max:99-->
      <th>modifier/supprimer</th>
    </tr>
  </thead>

  <tbody>

<?php

  foreach ($inventory as $inventory1) {
   ?>
    <tr>
       <td><?=$inventory1['id'];?></td>
       <td><?=$inventory1['character_id'];?></td>
       <td><?=$inventory1['object_id'];?></td>
       <td><?=$inventory1['amount'];?></td>
        <td>
        <a href="<?= $this->url("admin_inventory_modif", ["id" => $inventory1['id']]);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="<?= $this->url("admin_inventory_delete", ["id" => $inventory1['id']]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       </td>
  </tr>
<?php }?>

  </tbody>
</table>
</div>
<?php $this->stop('main_content') ?>
