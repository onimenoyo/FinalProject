<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content');?>
<h2>Modifier ces infos persos :</h2>

<form action="" method="post">
    <label for="pseudo">Pseudo</label>
    <input required type="text" name="pseudo" value="<?=$pseudo ?>">
    <span class="error"><?php if (!empty($error['pseudo'])){ echo  $error['pseudo']; } ?></span><br>
    <label for="pseudo">Prénom</label>
    <input required type="text" name="firstname" value="<?=$firstname ?>">
    <span class="error"><?php if (!empty($error['firstname'])){ echo  $error['firstname']; } ?></span><br>
    <label for="pseudo">Nom de Famille</label>
    <input required type="text" name="lastname" value="<?=$lastname ?>">
    <span class="error"><?php if (!empty($error['lastname'])){ echo  $error['lastname']; } ?></span><br>
    <label for="mail">E-mail</label>
    <input required type="email" name="mail" value="<?=$email ?>">
    <span class="error"><?php if (!empty($error['mail'])){ echo  $error['mail']; } ?></span><br>
    <p>Rôle :</p>
    <div class="form-group">
      <div class="col-sm-12">
        <div class="radio">
          <label>
            <input type="radio" name="role" value="user"> Utilisateur
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" value="admin"> Administrateur
          </label>
        </div>
      </div>
    </div>
    <span class="error"><?php if (!empty($error['role'])){ echo  $error['role']; } ?></span><br>
    <input type="submit" name="submituser">
</form>
<?php $this->stop('main_content') ?>
