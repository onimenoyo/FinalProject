<?php $this->layout('interfaceLayout', ['title' => 'Combat']) ?>

<?php $this->start('main_content') ?>
      <img src=" <?= $this->assetUrl('img/background/Intro_Victoire.jpg')?>" alt="Abords_Pont" />
      <div class="dialogue2">
        <p>
          Au bout de plusieurs semaines de combats, les aliens furent finalement repoussés lorsque
          des scientifiques utilisèrent plusieurs prototypes d’armure de combat combinant la
          technologie humaine et celle alien ayant pu être récupéré lors de certaines batailles.
          Enfin repoussé, l’armée mis sous quarantaine les portails, les enfermant dans d’immenses
          sarcophage de béton et protégé par des forces d’élites ainsi que des groupes de guerriers
          en armure nouvelle génération.
          Dès lors, tandis que la reconstruction avait commencé, un recrutement débuta afin de
          former un contingent de “chevalier”, chargé de se rendre de l’autre coté des portails et de les
          détruire.
      </p>
      </div>
      <div class="conteneur">
        <div class="contenu2 options">
          <form action="" method="post">
            Création de personnage : <br> <br>
            <label for="name">Nom</label>
            <input required type="text" name="name" value="">
            <span class="error"><?php if (!empty($error['name'])){ echo  $error['name']; } ?></span><br>
            <div class="flexbox">
              <div class="flexbox1">
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
              </div>
              <div class="flexbox1">
                <p>Sexe :</p>
                <div class="radio">
                  <label>
                    <input checked type="radio" name="gender" value="1"> Homme
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" value="0"> Femme
                  </label>
                </div>
              </div>

            </div>
              <span class="error"><?php if (!empty($error['role'])){ echo  $error['role']; } ?></span><br>
              <div class="cleaner">

              </div>
              <input type="submit" name="submituser" class="button3 option">
          </form>
        </div>
      </div>
<?php $this->stop('main_content') ?>
