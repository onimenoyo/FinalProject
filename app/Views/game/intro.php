<?php $this->layout('interfaceLayout', ['title' => 'Introduction']) ?>

<?php $this->start('main_content') ?>

<p>
  Nous avons toujours pensé que si nous n’étions pas seuls dans l’univers, ils viendraient de
l’espace. Nos satellites, nos navettes, rien ne nous prépara à leur arrivée.
C’était une journée comme les autres, et tu vaguais à tes occupations, quand soudain, des
portails s’ouvrirent un peu partout sur la planète et ils furent là.
Les premières heures furent dévastatrices, des villes disparurent de la carte, d’autres
devinrent des champs de batailles.
Tant bien que mal, tu réussis à survivre à cet affrontement, sauvant même plusieurs
personnes piégés dans des décombres.
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

<a href="<?= $this->url("character_creation")?>">Créer votre personnage</a>
<?php $this->stop('main_content') ?>
