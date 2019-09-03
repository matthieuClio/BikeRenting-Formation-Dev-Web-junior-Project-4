<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include'header/header_view.php'; ?>
	</head>

	<body>
		<header>
			<!-- Menu -->
			<?php include'menu/menu_view.php'; ?>

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
					<img src="public/images/photo/page_error.jpeg" alt="page erreur" class="image_error">
					
					<a href="" class="error_page">
						Retour à la page d'accueil
					</a>
				</p>
			</article>
		</main>
		
		<!-- Footer -->
		<?php include'footer/footer_view.php'; ?>
	</body>
</html>