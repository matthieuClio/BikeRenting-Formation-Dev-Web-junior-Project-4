<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_view.php'); ?>
	</head>

	<body>
		<header>
			<!-- Menu -->
			<?php require('menu/menu_view.php'); ?>

			<!-- Slider -->
			<div class="slider">
				<img src="public/images/slider/fond.jpg" alt="Image de couverture">
				<span class="filter"></span>
			</div>
		</header>

		<main>
			<section>
				<h1 class="banner">Page non trouvé</h1>
			</section>

			<article class="article_view">
				<h2 class="title_article_view">Vérifiez l'url du site</h2>
				<p class="text_article_view">
					<img src="public/images/photo/page_error.jpeg" alt="page erreur" style="width: 60%; height: 60%; margin-bottom: 25px;">
					<br>
					<a href="" class="return_error" style="color:white; background-color: black; padding: 10px;">
						Retour à la page d'accueil
					</a>
				</p>
			</article>
		</main>

	</body>
</html>