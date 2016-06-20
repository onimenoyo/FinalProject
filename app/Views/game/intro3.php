<?php $this->layout('interfaceLayout', ['title' => 'Intro']) ?>

<?php $this->start('main_content') ?>
      <img src=" <?= $this->assetUrl('img/background/Intro_Vortex.jpg')?>" alt="Abords_Pont" />
      <div class="dialogue3">
        <p>
          Nerveux, tu te trouves avec une cinquantaine d’autres soldats dans une large pièce, tous en
          armure tandis qu’un homme entre dans la pièce et vous observe tous avant de prendre la
          parole :
          “Félicitations à tous ! Vous voilà fier et vaillant combattant, défenseur de l’humanité..... Voilà
          comment mon discours est censé se dérouler. Je vous félicite, fait de vous des héros et
          vous envoi la fleur au fusil dans le portail.... Ha ! Vous ne vous attendiez pas à ça hein !
          Sachez que de l’autre côté, c’est l’enfer qui vous attends..... ce que vous allez découvrir va
          vous retourner l’estomac, mais vous avez été entraîné et équipé pour faire face à ça. Nous
          avons déjà établie un tête de pont, mais cela n’a pas été sans mal. “
          Derrière l’homme, le mur semble se mouvoir et vous vous rendez compte que c’est une
          énorme porte blindée
          “Je compte sur vous pour maintenir cet avant poste, et surtout détruire la machine qui
          permet aux aliens de venir dans notre monde!”
          La porte finie de s’ouvrir, dévoilant une sorte de vortex de six mètres de diamètre flottant au
          niveau du sol.
          “Bonne chance, nous comptons sur vous.”
          L’homme salut tandis que les premiers guerriers entre dans le vortex.
          Lorsque tu entres à ton tour, tu te sent comme étiré vers l’avant, aspiré et déchiré, la
          sensation est vraiment déplaisante et tu penses qu’elle serait pire sans ton armure.  Tu faits
          un pas en avant un second, et franchis le portail. Quelque secondes ou quelques heures
          après, incapable de te repérer niveau temps, tu arrives de l’autre côté, où tu découvres un
          paysage apocalyptique.
          Une ville en ruine se trouve devant toi, couverte de végétation par endroit tandis que des
          vaisseaux sont en suspend au dessus d’excroissances végétales étranges. Un groupe de
          soldat vous accueil et vous mène à l’avant­poste qui se trouve plus bas.
      </p>
      </div>
      <div class="conteneur">
        <div class="contenu options">
          <a href="<?= $this->url("camp")?>"><button class="button2 option" type="button" name="button">Suivant</button></a>
        </div>
      </div>
<?php $this->stop('main_content') ?>
