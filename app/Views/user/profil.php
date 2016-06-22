<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content');?>
  <div class='flex'>
    <img src="<?= $this->assetUrl($img_path)?>" alt="image de profil"  id='photoProfil'/><br>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <input type="file" name="image"><br>
      <input type="submit" name="submitfile" value="envoyer" class="submit">
    </form>

    <form class="" action="" method="post" enctype="multipart/form-data">
      <input type="submit" name="submitfile1" value="Supprimer l'image de profil" class="submit">
    </form>
    <?php if (!empty($file_name)) {
      ?> <h3>Votre image <?= $file_name ?> a été téléchargée</h3>
    <?php }
    if (!empty($errors)) {
      foreach ($errors as $error) {
      ?> <h3><?= $error ?></h3>
      <?php }
       }
     ?>

     <h2>Modifier ces infos persos :</h2>


     <form action="" method="post">
         <label for="pseudo">Pseudo</label><br>
         <input required type="text" name="pseudo" value="<?=$w_user['pseudo'] ?>">
         <span class="error"><?php if (!empty($error['pseudo'])){ echo  $error['pseudo']; } ?></span><br>
         <label for="pseudo">Prénom</label><br>
         <input required type="text" name="firstname" value="<?=$w_user['firstname'] ?>">
         <span class="error"><?php if (!empty($error['firstname'])){ echo  $error['firstname']; } ?></span><br>
         <label for="pseudo">Nom de Famille</label><br>
         <input required type="text" name="lastname" value="<?=$w_user['lastname'] ?>">
         <span class="error"><?php if (!empty($error['lastname'])){ echo  $error['lastname']; } ?></span><br>
         <label for="mail">E-mail</label><br>
         <input required type="email" name="mail" value="<?=$w_user['email'] ?>">
         <span class="error"><?php if (!empty($error['mail'])){ echo  $error['mail']; } ?></span><br>
         <input type="submit" name="submitfile2" class="submit">
    </form>

    <h2>Modifier le mot de passe</h2>


     <form action="" method="post">
         <label for="oldPassword">Ancien mot de passe</label><br>
         <input required type="password" name="oldPassword" value="<?php if (!empty($oldPassword)){echo  $oldPassword;} ?>">
         <span class="error"><?php if (!empty($error['oldPassword'])){ echo  $error['oldPassword']; } ?></span><br>
         <label for="newPassword">Nouveau mot de passe</label><br>
         <input required type="password" name="newPassword" value="<?php if (!empty($newPassword)){echo  $newPassword;} ?>">
         <span class="error"><?php if (!empty($error['newPassword'])){ echo  $error['newPassword']; } ?></span><br>
         <label for="newPassword2">Répeter le nouveau mot de passe</label><br>
         <input required type="password" name="newPassword2" value="<?php if (!empty($newPassword2)){echo  $newPassword2;} ?>">
         <span class="error"><?php if (!empty($error['newPassword2'])){ echo  $error['newPassword2']; } ?></span><br>
         <input type="submit" name="submitfile3" class="submit">

     </form>
   </div>
<?php $this->stop('main_content') ?>
