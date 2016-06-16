<?php $this->layout('adminLayout', ['title' => 'admin_news']) ?>

<?php $this->start('main_content');?>
<h2>Modifier la news :</h2>

<form action="" method="post">
    <label for="title">Title</label><br>
    <input required type="text" name="title" value="<?=$title ?>">
    <span class="error"><?php if (!empty($error['title'])){ echo  $error['title']; } ?></span><br>
    <label for="content">Content</label><br>
    <textarea required name="content" rows="8" cols="40"><?=$content ?></textarea>
    <span class="error"><?php if (!empty($error['content'])){ echo  $error['content']; } ?></span><br>
    <input type="submit">
</form>
<?php $this->stop('main_content') ?>
