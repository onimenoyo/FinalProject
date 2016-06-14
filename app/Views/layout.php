<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="Hero" content="Nous vous proposons une version web des livres dont vous êtes le héro. Vous aurez une gestion d'inventaire, de niveau de joueur comme de personnage.">

	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css')?>">
	<script type="text/javascript" src="<?= $this->assetUrl('js/jQuery.min.js') ?>"></script>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<script type="text/javascript" src="<?= $this->assetUrl('js/app.js') ?>"></script>
</head>
<body>
	<div class="container">
		<header>
			<div class="navbar">
        <a href="<?= $this->url("default_home")?>"><img src="<?= $this->assetUrl('img/Logo Final Project.png')?>" alt="Logo" class="logoSite"/></a>
        <ul class="menuSite">
          <li><a href="#">Nous contacter</a></li>
					<?php if (!empty($w_user)) { ?>
						<li><a href="<?= $this->url("logout")?>">Se déconnecter</a></li>
						<li><a href="<?= $this->url("profil")?>">Profil</a></li>
						<?php } else {?>
					<li><a href="<?= $this->url("register")?>">S'inscrire</a></li>
					<li><a href="<?= $this->url("login")?>">Se connecter</a></li>
					<?php } ?>
        </ul>
        <form class="logMenu hide" action="index.html" method="post">
          <input type="text" name="login" value=""><br>
          <input type="password" name="password" value=""><br>
          <input type="submit" name="connecter" value="Connexion">
        </form>
        <a href="#"  class="menuBurger"><i class="burger fa fa-bars" aria-hidden="true"></i></a>
        <div class="burgerDropDown hide">
          <ul>
            <li><a href="#">Se Connecter</a></li>
						<hr>
						<li><a href="<?= $this->url("register")?>">S'inscrire</a></li>
            <hr>
            <li><a href="#">Nous Contacter</a></li>
          </ul>
        </div>
      </div>
		</header>

		<section class="backdrop">
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
