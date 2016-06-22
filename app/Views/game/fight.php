<?php $this->layout('interfaceLayout', ['title' => 'Combat']) ?>

<?php $this->start('main_content') ?>
      <img src="<?= $this->assetUrl($avatar['img_path'])?>" alt="avatar" id="avatar"/>
      <div id="Mob">
        <img src="<?= $this->assetUrl('img/bestiaire/'.$cible.'.jpg')?>" alt="pnj" id="pnj"/>
        <div class="mobInfo">
          <div class="info"><strong>Nom : </strong>$mob->get_name()</div>
          <div class="info"><strong>Lvl : </strong>$mob->get_lvl()</div>
          <div class="info"><strong>Vie : </strong>$mob->get_life()</div>
          <div class="info"><strong>Armure : </strong>$mob->get_ca()</div>
        </div>
      </div>
      <img src="<?= $this->assetUrl('img/background/'.$lieu.'.jpg')?>" alt="Abords_Pont" />
      <div class="dialogue">
<div id="info">

</div>

      </div>
      <div class="conteneur">

        <div class="contenu menu">
          <a href="#" id="menu"><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/menublanc.png')?>" alt="Menu" />Menu</div></a>
          <a href="#" id="Character"><div class="button bmenu"><img src=<?= $this->assetUrl('img/icon/characterblanc.png')?> alt="Character" />Personnage</div></a>
          <a href="#" id='inventaire'><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/sacblanc.png')?>" alt="Sac" />Inventaire</div></a>

        </div>
        <div class="contenu options">

          <div class="menuAttack hide">
            <button class="button option" id="attack">Attaquer</button>
            <a href="#"><div class="button option" id="heal">Se Soigner</div></a>
            <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => $lieu ])?>"><div class="button option" id="run">Fuir !</div></a>
          </div>

          <div class="menuInventory conteneur2 hide">
            <div class="flexinventory">
              <div class="inventoryflex">
                <?php $i=0;
                if (count($objects) >0){
                foreach ($objects as $object) {
                  ?><div class="contenu slot"><img src="<?= $this->assetUrl('img/armes/'.$object['name'].'.png')?>" alt="<?= $object['name']; ?>" /><span>$q</span></div><?php
                  if (++$i == 2) break;
                }
                if (count($objects) == 1) {
                  ?><div class="contenu slot"><img src="" /></div> <?php
                }
              } else {
                ?><div class="contenu slot"><img src="" /></div>
                <div class="contenu slot"><img src="" /></div> <?php
              } ?>
              </div>

              <div class="inventoryflex">
                <?php if (count($objects) >2){
                 for ($i=2; $i < count($objects) ; $i++) {
                ?><div class="contenu slot"><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" /><span>$q</span></div><?php
              } if (count($objects) == 3) {
                ?><div class="contenu slot"><img src="" /></div> <?php
              }
            } else {
              ?><div class="contenu slot"><img src="" /></div>
              <div class="contenu slot"><img src="" /></div> <?php
            } ?>
              </div>

              <div class="inventoryflex">
                <?php if (count($objects) >4){
                 for ($i=2; $i < count($objects) ; $i++) {
                ?><div class="contenu slot"><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" /><span>$q</span></div><?php
              } if (count($objects) == 5) {
                ?><div class="contenu slot"><img src="" /></div> <?php
              }
            } else {
              ?><div class="contenu slot"><img src="" /></div>
              <div class="contenu slot"><img src="" /></div> <?php
            } ?>
                <div class="contenu">Credit : 0$</div>
              </div>

              <div class="inventoryflex">
                <?php if (count($objects) >6){
                 for ($i=2; $i < count($objects) ; $i++) {
                ?><div class="contenu slot"><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" /><span>$q</span></div><?php
              } if (count($objects) == 7) {
                ?><div class="contenu slot"><img src="" /></div> <?php
              }
            } else {
              ?><div class="contenu slot"><img src="" /></div>
              <div class="contenu slot"><img src="" /></div> <?php
            } ?>
              </div>

              <div class="inventoryflex">
                <?php if (count($objects) >8){
                 for ($i=2; $i < count($objects) ; $i++) {
                ?><div class="contenu slot"><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" /><span>$q</span></div><?php
              } if (count($objects) == 9) {
                ?><div class="contenu slot"><img src="" /></div> <?php
              }
            } else {
              ?><div class="contenu slot"><img src="" /></div>
              <div class="contenu slot"><img src="" /></div> <?php
            } ?>
              </div>
            </div>
          </div>

          <div class="menuConnexion">
            <a href="#"><div class="button option">Déconnexion</div></a>
            <a href="#"><div class="button option">Sauvegarder</div></a>
            <a href="#"><div class="button option">Profil</div></a>
          </div>

          <div class="hide" id="playerResponsive" >
            <div class="info"><strong>Nom : </strong>$player->get_name()</div>
            <div class="info"><strong>Lvl : </strong>$player->get_lvl()</div>
            <div class="info"><strong>Vie : </strong>$player->get_life()</div>
            <div class="info"><strong>Energie : </strong>$player->get_spirit()</div>
            <div class="info"><strong>Armure : </strong>$player->get_ca()</div>
          </div>
        </div>

        <div class="contenu infos " id="player">
          <div class="info"><strong>Nom : </strong>$player->get_name()</div>
          <div class="info"><strong>Lvl : </strong>$player->get_lvl()</div>
          <div class="info"><strong>Vie : </strong>$player->get_life()</div>
          <div class="info"><strong>Energie : </strong>$player->get_spirit()</div>
          <div class="info"><strong>Armure : </strong>$player->get_ca()</div>
        </div>

      </div>

<?php $this->stop('main_content') ?>

<?php $this->start('ajax'); ?>

<?php


$url = $this->url('attack', ['id' => $id, 'lieu' => $lieu, 'cible' => $cible]);
 ?>

<script type="text/javascript">

  $(document).ready(function(){

    $('#attack').click(function(e){
      e.preventDefault();

      $.ajax({
        type: 'get',
        url: '<?php echo $url; ?>',

        // en cas de succés :
        success: function(data){

          // renvoit l'information de la cible
           $('#info').html(data.cible);
           $('#info').html('hello world');

        },
        // si erreur :
        error : function(err){
        //  console.log (err);
        }
      });
    });
  });
</script>

<?php $this->stop('ajax') ?>
