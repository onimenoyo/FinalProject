<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content');?>
<h2>Modifier les inventaires :</h2>

<form action="" method="post">
    <label for="amount">Nombre</label>
    <input required type="number" name="amount" min="1" max="99" value="<?=$amount ?>">
    <span class="error"><?php if (!empty($error['amount'])){ echo  $error['amount']; } ?></span><br>
    <input type="submit">
</form>
<?php $this->stop('main_content') ?>
