<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>



<?php if (!empty($w_user)) { ?>
<h1>Bonjour <?= $w_user['firstname'].' '.$w_user['lastname']?></h1>
<?php } ?>
<?php foreach ($news as $new) {

  ?>
  <div class="home">
    <img src="<?= $this->assetUrl('img/Logo Final Project.png')?>" alt="Logo" class="logoSiteHome"/>
    <div class="cadre">
      <h1><?= $new['title'] ?></h1> <br>
      <p><?= $new['content'] ?></p>
      <h4><?= $new['created_at'] ?> par <?= $new['created_by'] ?></h4>
    </div>

  </div>
      <?php
} ?>
<?php if (!empty($w_user)) { ?>
<a href="<?= $this->url("intro")?>">Commencer une nouvelle aventure</a>

<?php }
 $this->stop('main_content') ?>
