<?php $this->layout('layout', ['title' => 'Validation e-mail']) ?>

<?php $this->start('main_content');?>
<h3>Votre adresse e-mail est maintenant actif.<h3>
<a href="<?= $this->url("login")?>">Vous connectez ?</a>
 <?php $this->stop('main_content') ?>
