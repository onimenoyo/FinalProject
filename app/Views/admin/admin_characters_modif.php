<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content');?>
<h2>Modifier les infos du personnage :</h2>

<form action="" method="post">
    <label for="name">Nom</label>
    <input required type="text" name="name" value="<?=$name ?>">
    <span class="error"><?php if (!empty($error['name'])){ echo  $error['name']; } ?></span><br>
    <label for="health">Vie</label>
    <input required type="number" name="health" min="1" max="9999" value="<?=$health ?>">
    <span class="error"><?php if (!empty($error['health'])){ echo  $error['health']; } ?></span><br>
    <label for="energy">Energie</label>
    <input required type="number" name="energy" min="1" max="9999" value="<?=$energy ?>">
    <span class="error"><?php if (!empty($error['energy'])){ echo  $error['energy']; } ?></span><br>
    <label for="armor">Armure</label>
    <input required type="number" name="armor" min="1" max="9999" value="<?=$armor ?>">
    <span class="error"><?php if (!empty($error['armor'])){ echo  $error['armor']; } ?></span><br>
    <label for="lvl">Niveau</label>
    <input required type="number" name="lvl" min="1" max="20" value="<?=$lvl ?>">
    <span class="error"><?php if (!empty($error['lvl'])){ echo  $error['lvl']; } ?></span><br>
    <label for="strength">Force</label>
    <input required type="number" name="strength" min="1" max="30" value="<?=$strength ?>">
    <span class="error"><?php if (!empty($error['strength'])){ echo  $error['strength']; } ?></span><br>
    <label for="dexterity">Dexterité</label>
    <input required type="number" name="dexterity" min="1" max="30" value="<?=$dexterity ?>">
    <span class="error"><?php if (!empty($error['dexterity'])){ echo  $error['dexterity']; } ?></span><br>
    <label for="spirit">Esprit</label>
    <input required type="number" name="spirit" min="1" max="30" value="<?=$spirit ?>">
    <span class="error"><?php if (!empty($error['spirit'])){ echo  $error['spirit']; } ?></span><br>
    <label for="social">Social</label>
    <input required type="number" name="social" min="1" max="30" value="<?=$social ?>">
    <span class="error"><?php if (!empty($error['social'])){ echo  $error['social']; } ?></span><br>
    <label for="lvl_spell">Niveau Sort</label>
    <input required type="number" name="lvl_spell" min="1" max="20" value="<?=$lvl_spell ?>">
    <span class="error"><?php if (!empty($error['lvl_spell'])){ echo  $error['lvl_spell']; } ?></span><br>
    <label for="exp">Expérience</label>
    <input required type="number" name="exp" min="0" max="2100" value="<?=$exp ?>">
    <span class="error"><?php if (!empty($error['exp'])){ echo  $error['exp']; } ?></span><br>
    <input type="submit">
</form>
<?php $this->stop('main_content') ?>
