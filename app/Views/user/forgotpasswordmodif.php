<?php $this->layout('layout', ['title' => 'Se Connecter']) ?>

<?php $this->start('main_content');?>
<form id="forgotpassword" action="" method="post">

    <label for="new_password1">Nouveau mot de passe</label>
    <input required type="password" name="new_password1" value="<?php if (!empty($newPassword1)){echo  $newPassword1;} ?>">
    <span class="error"><?php if (!empty($error['new_password1'])){ echo  $error['new_password1']; } ?></span>

    <label for="new_password2">Répeter le nouveau mot de passe</label>
    <input required type="password" name="new_password2" value="<?php if (!empty($newPassword2)){echo  $newPassword2;} ?>">
    <span class="error"><?php if (!empty($error['new_password2'])){ echo  $error['new_password2']; } ?></span>
    <input type="submit">

</form>

<?php
 $this->stop('main_content') ?>
