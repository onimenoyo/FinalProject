<?php $this->layout('layout', ['title' => 'Se Connecter']) ?>

<?php $this->start('main_content');?>
<form id="forgotpassword" action="" method="post">

    <label for="pseudo_or_email">email</label>
    <input required type="email" name="email" value="<?php if (!empty($email)){echo  $email;} ?>">
    <span class="error"><?php if (!empty($errorEmail)){ echo  $errorEmail; } ?></span>
    <input type="submit">

</form>

<?php $this->stop('main_content') ?>
