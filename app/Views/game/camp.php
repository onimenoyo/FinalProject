<?php $this->layout('interfaceLayout', ['title' => 'Camp']) ?>

<?php $this->start('main_content') ?>

  <p>
    L’avant poste se trouve dans les ruines d’une ville, plusieurs bâtiments ont été réquisitionnés et renforcés afin de pouvoir résister aux attaques.
    Par endroit des tourelles ont été installées, des tanks gardent également certains passages mais l’on peu voir que la majorité des soldats sont des porteurs d’armures.
  </p>

  <button type="button" id="Command" name="button">Centre de commandement</button>
  <button type="button" id="infirmary" name="button">Infirmerie</button>
  <button type="button" id="armory" name="button">Armurerie</button>
  <a href="<?= $this->url('explore', ['lieu' => 'Ruines'])?>"><button type="button" id="ruins" name="button">Explorer les ruines </button></a>

<?php $this->stop('main_content'); ?>
