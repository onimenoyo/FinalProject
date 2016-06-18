<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
  <label for="name">Nom</label>
  <input required type="text" name="name" value="">
  <span class="error"><?php if (!empty($error['name'])){ echo  $error['name']; } ?></span><br>
    <p>Classe :</p>
        <div class="radio">
          <label>
            <input type="radio" name="class" value="psy"> Technomage
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="class" value="ranger"> Rôdeur
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="class" value="soldier"> Soldat
          </label>
        </div>
    <p>Sexe :</p>
    <div class="radio">
      <label>
        <input type="radio" name="gender" value="1"> Homme
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="gender" value="0"> Femme
      </label>
    </div>
    <span class="error"><?php if (!empty($error['role'])){ echo  $error['role']; } ?></span><br>
    <input type="submit" name="submituser">
</form>

<?php $this->stop('main_content') ?>
