<?php $this->layout('layout', ['title' => 'Se Connecter']) ?>

<?php $this->start('main_content');?>
<form id="login" action="" method="post">

    <label for="pseudo_or_email">Pseudo ou email</label>
    <input required type="text" name="pseudo_or_email" value="<?php if (!empty($pseudo)){echo  $pseudo;} ?>">
    <span class="error"><?php if (!empty($errorLogin)){ echo  $errorLogin; } ?></span>
    <label for="password1">Mot de passe</label>
    <input required type="password" name="password" value="<?php if (!empty($password)){echo  $password;} ?>">
    <span class="error"><?php if (!empty($errorPassword)){ echo  $errorPassword; } ?></span>
    <input type="submit">

</form>
<br>
  <a href="<?= $this->url("forgotpassword")?>">Mot de passe oublié ...</a>

<?php $this->stop('main_content') ?>
