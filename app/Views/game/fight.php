<?php $this->layout('interfaceLayout', ['title' => 'Combat']) ?>

<?php $this->start('main_content') ?>

      <img src="<?= $this->assetUrl($img_path)?>" alt="avatar" id="avatar"/>
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

        <!-- div permettant de recevoir les infos ajax -->
        <div id="info">

        </div>


      </div>
      <div class="conteneur">
        <div class="contenu menu">
          <a href="#" id="menu"><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/menublanc.png')?>" alt="Menu" />Menu</div></a>
          <a href="#" id="Character"><div class="button bmenu"><img src="img/icon/characterblanc.png" alt="Character" />Personnage</div></a>
          <a href="#" id='inventaire'><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/sacblanc.png')?>" alt="Sac" />Inventaire</div></a>


        </div>
        <div class="contenu options">
          <button class="button option" id="attack">Attaquer</button>
          <a href="#"><div class="button option" id="heal">Se Soigner</div></a>
          <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => $lieu ])?>"><div class="button option" id="run">Fuir !</div></a>


        </div>
        <div class="contenu infos">
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
