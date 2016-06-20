<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="Hero" content="Nous vous proposons une version web des livres dont vous êtes le héro. Vous aurez une gestion d'inventaire, de niveau de joueur comme de personnage.">

	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styleGame.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

</head>
<body>
	<div class="container">
		<header>
		</header>

		<section class="backdrop">
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/app.js') ?>"></script>


	<?= $this->section('ajax') ?>
</body>
</html>
