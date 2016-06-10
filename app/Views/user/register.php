<?php $this->layout('layout', ['title' => 'S\'inscrire']) ?>

<?php $this->start('main_content');?>
<form id="login" action="" method="post">

    <label for="pseudo">Pseudo</label>
    <input required type="text" name="pseudo" value="<?php if (!empty($pseudo)){ echo  $pseudo; } ?>">
    <span class="error"><?php if (!empty($errorLogin)){ echo  $errorLogin; } ?></span>
    <label for="pseudo">Prénom</label>
    <input required type="text" name="firstname" value="<?php if (!empty($firstname)){ echo  $firstname; } ?>">
    <span class="error"><?php if (!empty($errorFirstname)){ echo  $errorFirstname; } ?></span>
    <label for="pseudo">Nom de Famille</label>
    <input required type="text" name="lastname" value="<?php if (!empty($lastname)){ echo  $lastname; } ?>">
    <span class="error"><?php if (!empty($errorLastname)){ echo  $errorLastname; } ?></span>
    <label for="mail">E-mail</label>
    <input required type="email" name="mail" value="<?php if (!empty($mail)){ echo  $mail; } ?>">
    <span class="error"><?php if (!empty($errormail)){ echo  $errormail; } ?></span>
    <label for="password1">Mot de passe</label>
    <input required type="password" name="password1" value="<?php if (!empty($password1)){ echo  $password1; } ?>">
    <span class="error"><?php if (!empty($errorPassword1)){ echo  $errorPassword1; } ?></span>
    <label for="password2">Vérification de mot de passe</label>
    <input required type="password" name="password2" value="<?php if (!empty($password2)){ echo  $password2; } ?>">
    <span class="error"><?php if (!empty($errorPassword2)){ echo  $errorPassword2; } ?></span>
    <input type="submit">

</form>
<?php $this->stop('main_content') ?>
