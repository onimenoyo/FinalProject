<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content');?>
  <img src="<?= $this->assetUrl($img_path)?>" alt="image de profil" />
  <form class="" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submitfile" value="envoyer">
  </form>
  <?php if (!empty($file_name)) {
    ?> <h3>Votre image <?= $file_name ?> a été téléchargée</h3>
  <?php }
  if (!empty($errors)) {
    foreach ($errors as $error) {
    ?> <h3><?= $error ?></h3>
    <?php }
    ?>
  <?php }
   ?>
  <h3><?php echo  $w_user['firstname']. ' ' . $w_user['lastname']; ?></h3>
<?php $this->stop('main_content') ?>
