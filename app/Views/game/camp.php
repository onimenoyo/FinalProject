<?php $this->layout('interfaceLayout', ['title' => 'Camp']) ?>

<?php $this->start('main_content') ?>
      <img src=" <?= $this->assetUrl('img/background/CampBG.jpg')?>" alt="Abords_Pont" />
      <div class="dialogue2">
        <p>
          L’avant poste se trouve dans les ruines d’une ville, plusieurs bâtiments ont été réquisitionnés et renforcés afin de pouvoir résister aux attaques.
          Par endroit des tourelles ont été installées, des tanks gardent également certains passages mais l’on peu voir que la majorité des soldats sont des porteurs d’armures.
        </p>
      </div>
      <div class="conteneur">
        <div class="contenu options">
          <a href="#" id="Command" class='button' name="button">Centre de commandement</a>
          <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => 'Infirmerie'])?>" id="infirmary" class='button' name="button">Infirmerie</a>
          <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => 'Armurerie'])?>" id="armory" class='button' name="button">Armurerie</a>
          <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => 'Ruines'])?>" id="ruins" class='button' name="button">Explorer les ruines </a>
        </div>
      </div>
<?php $this->stop('main_content'); ?>
