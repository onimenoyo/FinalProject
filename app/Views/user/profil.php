<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content');?>
  <img src="<?= $this->assetUrl($img_path)?>" alt="image de profil" />
  <form class="" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submitfile" value="envoyer">
  </form>

  <form class="" action="" method="post" enctype="multipart/form-data">
    <input type="submit" name="submitfile1" value="Supprimer l'image de profil">
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

   <h2>Modifier ces infos persos :</h2>

   <form action="" method="post">
       <label for="pseudo">Pseudo</label>
       <input required type="text" name="pseudo" value="<?=$w_user['pseudo'] ?>">
       <span class="error"><?php if (!empty($error['pseudo'])){ echo  $error['pseudo']; } ?></span><br>
       <label for="pseudo">Prénom</label>
       <input required type="text" name="firstname" value="<?=$w_user['firstname'] ?>">
       <span class="error"><?php if (!empty($error['firstname'])){ echo  $error['firstname']; } ?></span><br>
       <label for="pseudo">Nom de Famille</label>
       <input required type="text" name="lastname" value="<?=$w_user['lastname'] ?>">
       <span class="error"><?php if (!empty($error['lastname'])){ echo  $error['lastname']; } ?></span><br>
       <label for="mail">E-mail</label>
       <input required type="email" name="mail" value="<?=$w_user['email'] ?>">
       <span class="error"><?php if (!empty($error['mail'])){ echo  $error['mail']; } ?></span><br>
       <input type="submit" name="submitfile2">

       <h2>Modifier le mot de passe</h2>

   </form>

   <form action="" method="post">
       <label for="oldPassword">Ancien mot de passe</label>
       <input required type="password" name="oldPassword" value="<?php if (!empty($oldPassword)){echo  $oldPassword;} ?>">
       <span class="error"><?php if (!empty($error['oldPassword'])){ echo  $error['oldPassword']; } ?></span><br>
       <label for="newPassword">Nouveau mot de passe</label>
       <input required type="password" name="newPassword" value="<?php if (!empty($newPassword)){echo  $newPassword;} ?>">
       <span class="error"><?php if (!empty($error['newPassword'])){ echo  $error['newPassword']; } ?></span><br>
       <label for="newPassword2">Répeter le nouveau mot de passe</label>
       <input required type="password" name="newPassword2" value="<?php if (!empty($newPassword2)){echo  $newPassword2;} ?>">
       <span class="error"><?php if (!empty($error['newPassword2'])){ echo  $error['newPassword2']; } ?></span><br>
       <input type="submit" name="submitfile3">

   </form>
<?php $this->stop('main_content') ?>
