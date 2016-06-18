<!DOCTYPE html>
<html lang='fr'>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styleGame.css') ?>" media="screen" title="no title" charset="utf-8">
    <title>Interface Jeu</title>
  </head>
  <body>
    <section>
      <img src="<?= $this->assetUrl($img_path)?>" alt="avatar" id="avatar"/>
      <div id="Mob">
        <img src="img/pnj/Renegat.jpg" alt="pnj" id="pnj"/>
        <div class="mobInfo">
          <div class="info"><strong>Nom : </strong>$mob->get_name()</div>
          <div class="info"><strong>Lvl : </strong>$mob->get_lvl()</div>
          <div class="info"><strong>Vie : </strong>$mob->get_life()</div>
          <div class="info"><strong>Armure : </strong>$mob->get_ca()</div>
        </div>
      </div>
      <img src="img/background/BaseAlien.jpg" alt="Abords_Pont" />
      <div class="dialogue">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac dui et ligula ultricies vehicula a gravida nulla. Fusce enim tortor, mollis vel vehicula vel, faucibus sed ante. Lorem ipsum.
        </p>
      </div>
      <div class="conteneur">
        <div class="contenu menu">
          <a href="#" id="menu"><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/menublanc.png')?>" alt="Menu" />Menu</div></a>
          <a href="#" id="Character"><div class="button bmenu"><img src="img/icon/characterblanc.png" alt="Character" />Personnage</div></a>
          <a href="#" id='inventaire'><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/sacblanc.png')?>" alt="Sac" />Inventaire</div></a>
          <!-- <ul>
            <li><a href="#"><img src="img/icon/homeblanc.png" alt="home" />Home</a></li>
            <li><a href="#"><img src="img/icon/sacblanc.png" alt="sac" />Inventaire</a></li>
          </ul> -->

        </div>
        <div class="contenu options">
          <a href="#"><div class="button option">Attaquer</div></a>
          <a href="#"><div class="button option">Se Soigner</div></a>
          <a href="#"><div class="button option">Fuir !</div></a>

          <!-- <ul>
            <li><a href="#"><div class="button">Attaquer</div></a></li>
            <li><a href="#"><div class="button">Se Soigner</div></a></li>
            <li><a href="#"><div class="button">Fuir</div></a></li>
          </ul> -->

        </div>
        <div class="contenu infos">
          <div class="info"><strong>Nom : </strong>$player->get_name()</div>
          <div class="info"><strong>Lvl : </strong>$player->get_lvl()</div>
          <div class="info"><strong>Vie : </strong>$player->get_life()</div>
          <div class="info"><strong>Energie : </strong>$player->get_spirit()</div>
          <div class="info"><strong>Armure : </strong>$player->get_ca()</div>
        </div>
      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?= $this->assetUrl('js/app.js') ?>"></script>
  </body>
</html>


  <button type="button" class="attack" name="button">Attaque </button>
  <button type="button" class="magie" name="button">Magie  </button>
  <button type="button" class="heal" name="button">Se soigner </button>
  <button type="button" class="run" name="button">Fuite ! </button>