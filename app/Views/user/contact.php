<?php $this->layout('layout', ['title' => 'Se Connecter']) ?>

<?php $this->start('main_content');?>

<section id="contact">
  <h2 class='align_center'>Nous Contacter</h2>
  <form method="POST" action="" class="form">


    <label for="nom">Nom* :</label><br>
    <span class="error"><?php if (!empty($error['nom'])){ echo  $error['nom']; } ?></span><br>
    <input required type="text" name ="nom" id="nom" value="<?php if(!empty($_POST['nom'])) { echo $_POST['nom']; } ?>"><br>


    <label for="email">eMail* :</label><br>
    <span class="error"><?php if (!empty($error['email'])){ echo  $error['email']; } ?></span><br>
    <input required type="email" name ="email" id="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>"><br>


    <label for="sujet">Sujet* :</label><br>
    <span class="error"><?php if (!empty($error['sujet'])){ echo  $error['sujet']; } ?></span><br>
    <input required type="text" name ="sujet" id="sujet" value="<?php if(!empty($_POST['sujet'])) { echo $_POST['sujet']; } ?>"><br>

    <label for="message">Message* :</label><br>
    <span class="error"><?php if (!empty($error['message'])){ echo  $error['message']; } ?></span><br>
    <textarea name="message" id="message" rows="30" cols="90"><?php if(!empty($_POST['message'])) { echo $_POST['message']; } ?></textarea><br>
    <input required type="submit" name="submitform" value="Poster" class="submit"/>


  </form>
  <a href="https://twitter.com/FinalProject_wf" class='align_center'><img src="<?= $this->assetUrl('img/icon/social-twitter-icon.png');?>" alt="Twitter" /></a>
</section>

<?php $this->stop('main_content') ?>
