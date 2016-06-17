<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>



<?php if (!empty($w_user)) { ?>


<h1>Bonjour <?= $w_user['firstname'].' '.$w_user['lastname']?></h1>
<?php } ?>


<?php $this->stop('main_content') ?>
