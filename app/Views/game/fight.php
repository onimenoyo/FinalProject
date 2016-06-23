<?php $this->layout('interfaceLayout', ['title' => 'Combat']) ?>

<?php $this->start('main_content') ?>
      <img src="<?= $this->assetUrl($avatar['img_path'])?>" alt="avatar" id="avatar"/>
      <div id="Mob">
        <img src="<?= $this->assetUrl('img/Bestiaire/'.$cible.'.jpg')?>" alt="pnj" id="pnj"/>
        <div class="mobInfo">
          <div class="info"><strong>Nom : </strong> <?= $ennemi['name']?></div>
          <div class="info"><strong>Vie : </strong> <div id="ennemiHealth"><?= $ennemi['current_health'] ?></div> /  <?= $ennemi['health']?></div>
          <div class="info"><strong>Armure : </strong> <?= $ennemi['armor']?></div>
        </div>
      </div>
      <img src="<?= $this->assetUrl('img/background/'.$lieu.'.jpg')?>" alt="Abords_Pont" />

      <!-- information dans la bulle de dialogue  -->
      <div class="dialogue">

        <?php if(!empty($joueur['touch'])){ echo $joueur['touch'];} ?>
        <br>
        <?php if(!empty($ennemi['touch'])){ echo $ennemi['touch'];} ?>

      </div>
      <div class="conteneur">

        <div class="contenu menu">
          <a href="#" id="menu"><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/menublanc.png')?>" alt="Menu" />Menu</div></a>
          <a href="#" id="Character"><div class="button bmenu"><img src=<?= $this->assetUrl('img/icon/characterblanc.png')?> alt="Character" />Personnage</div></a>
          <a href="#" id='inventaire'><div class="button bmenu"><img src="<?= $this->assetUrl('img/icon/sacblanc.png')?>" alt="Sac" />Inventaire</div></a>

        </div>
        <div class="contenu options">

          <div class="menuAttack">
            <?php if($ennemi['current_health'] >= 0){ ?>
              <a href="<?= $this->url('attack', ['id' => $id, 'cible' => $cible, 'lieu' => $lieu,'avatar' => $avatar, 'objects' => $objects, 'character' => $character, "pvcible" => $pvcible, "pvjoueur" => $pvjoueur ])?>"><div class="button option" id="run">Attaquer</div></a>
              <a href="#"><div class="button option" id="heal">Se Soigner</div></a>
              <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => $lieu ])?>"><div class="button option" id="run">Fuir !</div></a>
            <?php }else{ ?>
              <a href="<?= $this->url('explore', ['id' => $id, 'lieu' => $lieu ])?>"><div class="button option" id="run">Continuer l'aventure !</div></a>
            <?php }  ?>
          </div>

          <div class="menuInventory conteneur2 hide">
            <div class="flexinventory">
              <div class="inventoryflex">
                <?php $i=0;
                if (count($objects) >0){
                for ($i=0; $i < 2 ; $i++) {
                  ?><div class="contenu slot"><a href="<?= $this->url("equip", ['equip' => $objects[$i]['id'],
                                                      'id' => $id,
                                                      'lieu' => $lieu,
                                                      'cible' => $cible,
                                                      'avatar' => $avatar,
                                                      'objects' => $objects ,
                                                      'character' => $character,
                                                      'ennemi' => $ennemi ])
                    ?> "><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" />
                      <span class="valueObject"><?= $objects[$i]['value'] ?> $</span><span class="amount"><?= $inventory[$i]['amount']?></span>

                  <?php if ($character['weapon_id'] == $objects[$i]['id']) {
                    ?> <span class="equip"> Eq </span></a></div> <?php
                  } else {
                    ?> </a></div> <?php
                  } ?>
                  <?php
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
                <?php
                if (count($objects) >2){
                 for ($i=2; $i < 4 ; $i++) {
                ?><div class="contenu slot"><a href="<?= $this->url("equip", ['equip' => $objects[$i]['id'],
                                                    'id' => $id,
                                                    'lieu' => $lieu,
                                                    'cible' => $cible,
                                                    'avatar' => $avatar,
                                                    'objects' => $objects ,
                                                    'character' => $character,
                                                    'ennemi' => $ennemi ])
                  ?> "><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" />
                  <span  class="valueObject"><?= $objects[$i]['value']; ?> $ </span><span class="amount"><?= $inventory[$i]['amount']?></span>

                  <?php if ($character['weapon_id'] == $objects[$i]['id']) {
                    ?> <span  class="equip"> Eq </span><a/></div> <?php
                  } else {
                    ?> </a></div> <?php
                  } ?>
                  <?php if (count($objects) <= 3) {
                    break;
                  } ?>
                <?php
              } if (count($objects) == 3) {
                ?><div class="contenu slot"><img src="" /></div> <?php
              }
            } else {
              ?><div class="contenu slot"><img src="" /></div>
              <div class="contenu slot"><img src="" /></div> <?php
            } ?>
              </div>

              <div class="inventoryflex">
                <?php
                 if (count($objects) >4){
                 for ($i=4; $i < 6 ; $i++) {
                ?><div class="contenu slot"><a href="<?= $this->url("equip", ['equip' => $objects[$i]['id'],
                                                    'id' => $id,
                                                    'lieu' => $lieu,
                                                    'cible' => $cible,
                                                    'avatar' => $avatar,
                                                    'objects' => $objects ,
                                                    'character' => $character,
                                                    'ennemi' => $ennemi ])
                  ?> "><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" />
                  <span  class="valueObject"><?= $objects[$i]['value']; ?> $</span><span class="amount"><?= $inventory[$i]['amount']?></span>
                <?php if ($character['weapon_id'] == $objects[$i]['id']) {
                  ?> <span  class="equip"> Eq </span></a></div> <?php
                }else {
                  ?> </a></div> <?php
                }
                 if (count($objects) <= 5) {
                  break;
                }
              } if (count($objects) == 5) {
                ?><div class="contenu slot"><img src="" /></div> <?php
              }
            } else {
              ?><div class="contenu slot"><img src="" /></div>
              <div class="contenu slot"><img src="" /></div> <?php
            } ?>
                <div class="contenu">Credit : <?= $character['gold'] ?> $</div>
              </div>

              <div class="inventoryflex">
                <?php
                 if (count($objects) >6){
                 for ($i=6; $i < 8 ; $i++) {
                ?><div class="contenu slot"><a href="<?= $this->url("equip", ['equip' => $objects[$i]['id'],
                                                    'id' => $id,
                                                    'lieu' => $lieu,
                                                    'cible' => $cible,
                                                    'avatar' => $avatar,
                                                    'objects' => $objects ,
                                                    'character' => $character,
                                                    'ennemi' => $ennemi ])
                  ?> "><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" />
                  <span  class="valueObject"><?= $objects[$i]['value']; ?> $</span><span class="amount"><?= $inventory[$i]['amount']?></span>
                <?php if ($character['weapon_id'] == $objects[$i]['id']) {
                  ?> <span  class="equip"> Eq </span></a></div> <?php
                }else {
                  ?> </a></div> <?php
                }
                if (count($objects) <= 7) {
                  break;
                }
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
                ?><div class="contenu slot"><a href="<?= $this->url("equip", ['equip' => $objects[$i]['id'],
                                                    'id' => $id,
                                                    'lieu' => $lieu,
                                                    'cible' => $cible,
                                                    'avatar' => $avatar,
                                                    'objects' => $objects ,
                                                    'character' => $character,
                                                    'ennemi' => $ennemi ])
                  ?> "><img src="<?= $this->assetUrl('img/armes/'.$objects[$i]['name'].'.png')?>" alt="<?= $objects[$i]['name']; ?>" />
                  <span  class="valueObject"><?= $objects[$i]['value']; ?> $</span><span class="amount"><?= $inventory[$i]['amount']?></span>
                <?php
                 if ($character['weapon_id'] == $objects[$i]['id']) {
                  ?> <span  class="equip"> Eq </span></a></div> <?php
                }else {
                  ?> </a></div> <?php
                }
                if (count($objects) <= 5) {
                 break;
               }
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

          <div class="menuConnexion hide">
            <a href="#"><div class="button option">Déconnexion</div></a>
            <a href="#"><div class="button option">Sauvegarder</div></a>
            <a href="#"><div class="button option">Profil</div></a>
          </div>

          <div class="hide" id="playerResponsive" >
            <div class="info"><strong>Nom : </strong><?= $character['name']; ?></div><br>
            <div class="info"><strong>Lvl : </strong><?= $character['lvl']; ?></div><br>
            <div class="info"><strong>Vie : </strong><?= $pvjoueur; ?> / <?= $character['health']; ?></div><br>
            <div class="info"><strong>Energie : </strong><?= $character['energy']; ?></div><br>
            <div class="info"><strong>Armure : </strong><?= $character['armor']; ?></div>
          </div>
        </div>

        <div class="contenuinfo infos " id="player">
          <div class="info"><strong>Nom : </strong><?= $character['name']; ?></div><br>
          <div class="info"><strong>Lvl : </strong><?= $character['lvl']; ?></div><br>
          <div class="info"><strong>Vie : </strong><?= $joueur['current_health']; ?> / <?= $character['health']; ?></div><br>
          <div class="info"><strong>Energie : </strong><?= $character['energy']; ?></div><br>
          <div class="info"><strong>Armure : </strong><?= $character['armor']; ?></div>
        </div>

      </div>

<?php $this->stop('main_content') ?>
