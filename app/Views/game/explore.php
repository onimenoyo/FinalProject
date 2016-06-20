<?php $this->layout('interfaceLayout', ['title' => $lieu]); ?>
<?php $this->start('main_content'); ?>

<?php if($lieu == 'Ruines'){ ?>

<p>
  La ville dans laquelle tu circules n’est que ruine et végétaux. Les seuls bruits que tu entends sont ceux des combats dans le lointain, parfois des morceaux de pierre s’écroulant d’immeuble.
  Par endroit tu peux apercevoir des animaux errer dans les rues, fuyant devant ta présence qui semble les déranger.
  Les rues sont désespérément vides, le vent portant des bouts de papier tel une scène de western.
</p>

<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>

<?php }elseif($lieu == 'Centre_Commercial'){ ?>

<p>
  Ton exploration te mène à un grand centre commercial abandonné. Lorsque tu entres à l’intérieur, tu découvres un plafond éventré tandis que la végétation a commencé à rependre ses droits sur le béton.
  Explorant les lieux, tu peux voir que les boutiques ont été éventrées et pillées. Par endroit, des vêtements traînent à même le sol. Il y a encore des objets récupérables par endroit, bien que tu n’en ai pas l’utilité.
</p>

  <a href="<?= $this->url('explore', ['lieu' => 'Ruines'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Gare'){ ?>

<p>
  Tes pas t’ont amené à ce qui semble être l’une des gares importante de la ville. L’intérieur est couvert d’une végétation luxuriante. Tu ne sais pas depuis combien de temps l’invasion de cette planète a eu lieu, mais tu restes impressionné de voir la vitesse à laquelle les installations se sont dégradées.
  Après avoir fait le tour des lieux, délogeant des animaux redevenus sauvages, tu finis par reprendre ta route.
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Ruines'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Musee'){ ?>

<p>
  Au bout d’un moment d’exploration, tu finis par découvrir un vieux musé et poussé par la curiosité, tu te décides d’y entrer. Le sentiment est étrange, bien que la ressemblance entre notre monde et celui-ci soit frappante, tu découvres que la culture a vraiment évolué différemment ici.
  En flânant à travers les galeries, tu peu admirer de nombreuses peintures, statues, avant de finir par arriver sur la partie dédiée à l’espace.
  Tu y découvres que la conquête spatiale ne s’est jamais arrêté dans ce monde, poussant jusqu’à l’installation de colonie sur la lune, mars, et l’envoie de vaisseaux dans l’inconnu de l’espace.
  Ayant fait le tour, tu finis par ressortir.
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Ruines'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Abords'){ ?>

<p>
  Au bout d’un moment, tu finis par arriver aux abords de la ville, entourée de son périphérique aérien tombant en morceaux. Tu te trouves dans une banlieue vraiment typique, avec ses HLM, petites maisons et magasins de quartier. Moins touché que le centre ville, les lieux sont tout de même abandonnés et s’effondrant par manque d’entretien.
  Étrangement, l’ambiance est un peu plus déprimante que dans le centre ville, peut-être parce que les bâtiments ont été moins touchés…
</p>

<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>
<a href="<?= $this->url('explore', ['lieu' => 'Ruines'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Pont'){ ?>

<p>
  Après quelques heures à circuler à travers les voitures abandonnées et les rues silencieuses, tu arrives à un pont. Celui-ci devait être beau avant d’être brisé par l’invasion alien.
  Des barques se trouvent le long du fleuve, te permettant de passer de l’autre coté sans encombre tandis qu’au loin tu vois la mer dans laquelle se jette le fleuve.
</p>
<a href="<?= $this->url('explore', ['lieu' => 'Abords'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Aeroport'){  ?>

<p>
  Ta recherche te mène à un aéroport situé en bord de mer. La digue qui devait maintenir la mer à distance ayant du céder depuis un certain temps au vu de l’eau et du sable reprenant de l’avance sur la terre.
  La végétation a beau couvrir des endroits, c’est principalement l’eau qui a entreprit de ronger tout ce qui aurait pu être récupérable.
  Tout de même, l’emplacement de cet aéroport pourrait intéresser le commandant.
</p>
<a href="<?= $this->url('explore', ['lieu' => 'Abords'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Frontiere'){  ?>

<p>
  La végétation est de plus en plus dense, il devient difficile de voir les bâtiments ou véhicules sous cet amas vert. Il devient de plus en plus difficile de s’orienter.
  A moins de tout raser ou d’y aller au lance-flammes, tu doutes de voir un humain reprendre possession des lieux un jour.
</p>
<a href="<?= $this->url('explore', ['lieu' => 'Abords'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Foret'){  ?>

<p>
  Les lieux sont paisibles et semblent ne pas avoir été touché par les conflits. Les cratères, carcasses de voiture ou autre objet trouvable sous la verdure restent tout de même un souvenir constant de ce qu’il se passe à l'extérieur de cet endroit.
  Il y a quelque chose d’inhabituel dans cette forêt malgré tout, bien qu’elle semble ancienne, elle ne fait pas tout à fait naturelle, comme ayant été développée rapidement.
  Tu peux tout de même croiser des animaux par moment et tu sais que tu es à l'abri de certains ennemis ici.
</p>

<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>
<a href="<?= $this->url('explore', ['lieu' => 'Abords'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Camp_Survivants'){  ?>

<p>
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Foret'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Bosquet'){  ?>

<p>
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Foret'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Lac'){  ?>

<p>
</p>

<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>
<a href="<?= $this->url('explore', ['lieu' => 'Foret'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Chateau_Antique'){  ?>

<p>
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Lac'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Porte_Montagnes'){  ?>

<p>
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Lac'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Montagne'){  ?>

<p>
</p>

<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>
<a href="<?= $this->url('explore', ['lieu' => 'Lac'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Vieux_Temple'){  ?>

<p>
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Montagne'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Caverne'){  ?>

<p>
</p>

<a href="<?= $this->url('explore', ['lieu' => 'Montagne'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Base_Alien'){  ?>

<p>
</p>

<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>
<a href="<?= $this->url('explore', ['lieu' => 'Montagne'])?>"><button type="button" id="return" name="button">Retour</button></a>

<?php }elseif($lieu == 'Entree_Secrete'){  ?>

<p>
</p>
<a href="<?= $this->url('explore', ['lieu' => 'Base_Alien'])?>"><button type="button" id="return" name="button">Retour</button></a>
<a href="<?= $this->url('explore', ['lieu' => 'Generateur'])?>"><button type="button" id="return" name="button">Attaquer le Generateur</button></a>


<?php }elseif($lieu == 'Generateur'){  ?>

<p>
</p>
<a href="<?= $this->url('explore', ['lieu' => 'Entree_Secrete'])?>"><button type="button" id="return" name="button">Retour</button></a>


<?php } ?>


  <button type="button" id="heal" name="button">Soin</button>
  <a href="<?= $this->url('camp')?>"><button type="button" id="backtocamp" name="button">Retour au camp</button></a>


<?php $this->stop('main_content'); ?>
