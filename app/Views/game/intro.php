<?php $this->layout('interfaceLayout', ['title' => 'Intro']) ?>

<?php $this->start('main_content') ?>
      <img src=" <?= $this->assetUrl('img/background/Intro_Invasion.jpg')?>" alt="Abords_Pont" />
      <div class="dialogue2">
        <p>
          Nous avons toujours pensé que si nous n’étions pas seuls dans l’univers, ils viendraient de
        l’espace. Nos satellites, nos navettes, rien ne nous prépara à leur arrivée.
        C’était une journée comme les autres, et tu vaguais à tes occupations, quand soudain, des
        portails s’ouvrirent un peu partout sur la planète et ils furent là.
        Les premières heures furent dévastatrices, des villes disparurent de la carte, d’autres
        devinrent des champs de batailles.
        Tant bien que mal, tu réussis à survivre à cet affrontement, sauvant même plusieurs
        personnes piégés dans des décombres.
      </p>
      </div>
      <div class="conteneur">
        <div class="contenu options">
          <a href="<?= $this->url("intro2")?>"><button class="button2 option" type="button" name="button">Suivant</button></a>
        </div>
      </div>
<?php $this->stop('main_content') ?>
