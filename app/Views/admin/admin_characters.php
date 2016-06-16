<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content')?>
<h1>Tous les personnages</h1>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>user_id</th>
      <th>name</th>
      <th>lvl</th>
      <th>strength</th>
      <th>dexterity</th>
      <th>spirit</th>
      <th>social</th>
      <th>page_id</th>
      <th>img_id</th>
      <th>exp</th>
      <th>gender</th>
      <th>modifier/supprimer</th>
    </tr>
  </thead>

  <tbody>

<?php

  foreach ($characters as $character) {
   ?>
    <tr>
       <td><?=$character['id'];?></td>
       <td><?=$character['user_id'];?></td>
       <td><?=$character['name'];?></td>
       <td><?=$character['lvl'];?></td>
       <td><?=$character['strength'];?></td>
       <td><?=$character['dexterity'];?></td>
       <td><?=$character['spirit'];?></td>
       <td><?=$character['social'];?></td>
       <td><?=$character['page_id'];?></td>
       <td><?=$character['img_id'];?></td>
       <td><?=$character['exp'];?></td>
       <td><?=$character['gender'];?></td>
       <td>
        <a href="<?= $this->url("admin_characters_modif", ["id" => $character['id']]);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="<?= $this->url("admin_characters_delete", ["id" => $character['id']]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       </td>
  </tr>
<?php }?>

  </tbody>
</table>
</div>
<?php $this->stop('main_content') ?>
