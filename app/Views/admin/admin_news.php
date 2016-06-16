<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content')?>
<h1>Toutes les news</h1>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>title</th>
      <th>content</th>
      <th>created_at</th>
      <th>modified_at</th>
      <th>created_by</th>
      <th>modified_by</th>
      <th>modifier/supprimer</th>
    </tr>
  </thead>

  <tbody>

<?php

  foreach ($news as $new) {
   ?>
    <tr>
       <td><?=$new['id'];?></td>
       <td><?=$new['title'];?></td>
       <td><?=$new['content'];?></td>
       <td><?=$new['created_at'];?></td>
       <td><?php if (!empty($new['modified_at'])) {
         echo $new['modified_at'];
       } else {
         echo "-";
       } ?></td>
       <td><?=$new['created_by'];?></td>
       <td><?php if (!empty($new['modified_by'])) {
         echo $new['modified_by'];
       } else {
         echo "-";
       } ?></td>
       <td>
        <a href="<?= $this->url("admin_news_modif", ["id" => $new['id']]);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="<?= $this->url("admin_news_delete", ["id" => $new['id']]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
       </td>
  </tr>
<?php }?>

  </tbody>
</table>
</div>
  <a href="<?= $this->url("admin_news_add")?>"><input type="button" name="name" value="Ajouter une news !"></a>
<?php $this->stop('main_content') ?>
