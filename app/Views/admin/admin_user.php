<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content')?>
<h1>Tous les utilisateurs</h1>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>pseudo</th>
      <th>email</th>
      <th>lastname</th>
      <th>firstname</th>
      <th>avatar_id</th>
      <th>token</th>
      <th>last_connexion</th>
      <th>ip</th>
      <th>role</th>
      <th>actif</th>
      <th>created_at</th>
      <th>modified_at</th>
      <th>modifier/supprimer</th>
    </tr>
  </thead>

  <tbody>

<?php

  foreach ($users as $user) {
   ?>
    <tr>
       <td><?=$user['id'];?></td>
       <td><?=$user['pseudo'];?></td>
       <td><?=$user['email'];?></td>
       <td><?=$user['lastname'];?></td>
       <td><?=$user['firstname'];?></td>
       <td><?=$user['avatar_id'];?></td>
       <td><?=$user['token'];?></td>
       <td><?=$user['last_connexion'];?></td>
       <td><?=$user['ip'];?></td>
       <td><?=$user['role'];?></td>
       <td><?=$user['actif'];?></td>
       <td><?=$user['created_at'];?></td>
       <td><?=$user['modified_at'];?></td>
       <td>
        <a href="<?= $this->url("admin_user_modif", ["id" => $user['id']]);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="<?= $this->url("admin_user_delete", ["id" => $user['id']]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       </td>
  </tr>
<?php }?>

  </tbody>
</table>
</div>
<?php $this->stop('main_content') ?>
