<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content');?>
<h2>Modifier les inventaires :</h2>

<form action="" method="post">
    <label for="amount">Nombre</label>
    <input required type="number" name="amount" min="1" max="99" value="<?=$amount ?>">
    <span class="error"><?php if (!empty($error['amount'])){ echo  $error['amount']; } ?></span><br>
    <label for="max_slot">Nombre d'emplacements maximum</label>
    <input required type="number" name="max_slot" min="1" max="30" value="<?=$max_slot ?>">
    <span class="error"><?php if (!empty($error['max_slot'])){ echo  $error['max_slot']; } ?></span><br>
    <label for="gold">Or</label>
    <input required type="number" name="gold" min="1" max="9999" value="<?=$gold ?>">
    <span class="error"><?php if (!empty($error['gold'])){ echo  $error['gold']; } ?></span><br>
    <input type="submit">
</form>
<?php $this->stop('main_content') ?>
