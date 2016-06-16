<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content');?>
<h2>Modifier <?= $name ?> :</h2>

<form action="" method="post">
    <label for="name">Nom</label>
    <input required type="text" name="name" value="<?=$name ?>">
    <span class="error"><?php if (!empty($error['name'])){ echo  $error['name']; } ?></span><br>
    <label for="dice">Dés</label>
    <input required type="number" name="dice" min="0" max="20" value="<?=$dice ?>">
    <span class="error"><?php if (!empty($error['dice'])){ echo  $error['dice']; } ?></span><br>
    <label for="damage">Dégats</label>
    <input required type="number" name="damage" min="0" max="20" value="<?=$damage ?>">
    <span class="error"><?php if (!empty($error['damage'])){ echo  $error['damage']; } ?></span><br>
    <label for="defense">Défense</label>
    <input required type="number" name="defense" min="0" max="15" value="<?=$defense ?>">
    <span class="error"><?php if (!empty($error['defense'])){ echo  $error['defense']; } ?></span><br>
    <label for="value">Esprit</label>
    <input required type="number" name="value" min="0" max="9999" value="<?=$value ?>">
    <span class="error"><?php if (!empty($error['value'])){ echo  $error['value']; } ?></span><br>
    <label for="weight">Poids</label>
    <input required type="number" name="weight" min="0" max="9999" value="<?=$weight ?>">
    <span class="error"><?php if (!empty($error['weight'])){ echo  $error['weight']; } ?></span><br>
    <label for="heal">Soin</label>
    <input required type="number" name="heal" min="0" max="200" value="<?=$heal ?>">
    <span class="error"><?php if (!empty($error['heal'])){ echo  $error['heal']; } ?></span><br>
    <label for="energy">Energie</label>
    <input required type="number" name="energy" min="0" max="200" value="<?=$energy ?>">
    <span class="error"><?php if (!empty($error['energy'])){ echo  $error['energy']; } ?></span><br>
    <input type="submit">
</form>
<?php $this->stop('main_content') ?>
