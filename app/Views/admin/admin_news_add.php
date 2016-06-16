<?php $this->layout('adminLayout', ['title' => 'admin_user']) ?>

<?php $this->start('main_content')?>
<form id="login" action="" method="post">

    <label for="title">Title</label>
    <input required type="text" name="title" value="<?php if (!empty($title)){ echo  $title; } ?>">
    <span class="error"><?php if (!empty($error['title'])){ echo  $error['title']; } ?></span><br>
    <label for="content">Content</label>
    <input required type="text" name="content" value="<?php if (!empty($content)){ echo  $content; } ?>">
    <span class="error"><?php if (!empty($error['content'])){ echo  $error['content']; } ?></span><br>
    <input type="submit">

</form>
<?php $this->stop('main_content') ?>
