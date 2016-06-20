<?php $this->layout('layout', ['title' => 'Se Connecter']) ?>

<?php $this->start('main_content');?>
<h3>Un e-mail à été envoyer à l'adresse suivante : <?= $mail ?></h3>
<?php
 $this->stop('main_content') ?>
