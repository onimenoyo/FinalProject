<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">

	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css')?>">
	<script type="text/javascript" src="<?= $this->assetUrl('js/jQuery.min.js') ?>"></script>
  <script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
  <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<script type="text/javascript" src="<?= $this->assetUrl('js/app.js') ?>"></script>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="<?= $this->url("dashboard")?>">
      <img alt="Brand" style="width: 4em; height:1.5em;" src="<?= $this->assetUrl('img/Logo Final Project.png')?>">
    </a>
  </div>
</div>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?= $this->url("default_home")?>">Retour au site</a></li>
        <li><a href="<?= $this->url("admin_news")?>">Gestion des news</a></li>
        <li><a href="<?= $this->url("admin_user")?>">Gestion du compte</a></li>
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion des bases de données du jeu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= $this->url("admin_characters")?>">Personnages</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= $this->url("admin_inventory")?>">Inventaires</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?=$this->url("admin_objects")?>">Objets</a></li>
						<li role="separator" class="divider"></li>
            <li><a href="<?= $this->url("admin_pnj")?>">Personnages non joueur</a></li>
          </ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
