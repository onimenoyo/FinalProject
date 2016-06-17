<?php $this->layout('layout', ['title' => 'Camp']); ?>
<?php $this->start('main_content'); ?>

  <button type="button" class="Command" name="button">Centre de commandement</button>
  <button type="button" class="infirmary" name="button">Infirmerie</button>
  <button type="button" class="armory" name="button">Armurerie</button>
  <button type="button" class="ruins" name="button"><a href="explore.php?lieu=ruins">Explorer les ruines </a></button>




<?php $this->stop('main_content'); ?>
