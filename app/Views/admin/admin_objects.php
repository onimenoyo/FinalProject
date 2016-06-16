<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content')?>
<h1>Tous les objets</h1>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>dice</th> <!--max:20 -->
      <th>damage</th><!--max:20 -->
      <th>defense</th><!--max:15 -->
      <th>value</th><!--max:9999 -->
      <th>weight</th><!--max:9999 -->
      <th>heal</th><!--max:200 -->
      <th>energy</th><!--max:200 -->
      <th>img_id</th>
      <th>modifier/supprimer</th>
    </tr>
  </thead>

  <tbody>

<?php

  foreach ($objects as $object) {
   ?>
    <tr>
       <td><?=$object['id'];?></td>
       <td><?=$object['name'];?></td>
       <td><?=$object['dice'];?></td>
       <td><?=$object['damage'];?></td>
       <td><?=$object['defense'];?></td>
       <td><?=$object['value'];?></td>
       <td><?=$object['weight'];?></td>
       <td><?=$object['heal'];?></td>
       <td><?=$object['energy'];?></td>
       <td><?=$object['img_id'];?></td>
       <td>
        <a href="<?= $this->url("admin_objects_modif", ["id" => $object['id']]);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="<?= $this->url("admin_objects_delete", ["id" => $object['id']]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       </td>
  </tr>
<?php }?>

  </tbody>
</table>
</div>
<?php $this->stop('main_content') ?>
