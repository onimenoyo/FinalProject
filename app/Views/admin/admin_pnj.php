<?php $this->layout('adminLayout', ['title' => 'admin_pnj']) ?>

<?php $this->start('main_content')?>
<h1>Tous les personnages non joueurs</h1>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>exp</th>
      <th>strength</th>
      <th>dexterity</th>
      <th>spirit</th>
      <th>social</th>
      <th>attack</th>
      <th>img_id</th>
      <th>meet</th>
      <th>modifier/supprimer</th>
    </tr>
  </thead>

  <tbody>

<?php

  foreach ($pnj as $pnj1) {
   ?>
    <tr>
       <td><?=$pnj1['id'];?></td>
       <td><?=$pnj1['name'];?></td>
       <td><?=$pnj1['exp'];?></td>
       <td><?=$pnj1['strength'];?></td>
       <td><?=$pnj1['dexterity'];?></td>
       <td><?=$pnj1['spirit'];?></td>
       <td><?=$pnj1['social'];?></td>
       <td><?=$pnj1['attack'];?></td>
       <td><?=$pnj1['img_id'];?></td>
       <td><?=$pnj1['meet'];?></td>
       <td>
        <a href="<?= $this->url("admin_pnj_modif", ["id" => $pnj1['id']]);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="<?= $this->url("admin_pnj_delete", ["id" => $pnj1['id']]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       </td>
  </tr>
<?php } ?>

  </tbody>
</table>
</div>
<?php $this->stop('main_content') ?>
