<?php $this->layout('layout', ['title' => 'Se Connecter']) ?>

<?php $this->start('main_content');?>
<h3>Un e-mail à été envoyer à l'adresse suivante : <?= $email ?></h3>
<?php
  echo '<a href="http://localhost/FinalProject/public/forgotpassword/'.$token.'"> http://localhost/FinalProject/public/forgotpassword/'.$token.'</a>';
 $this->stop('main_content') ?>
