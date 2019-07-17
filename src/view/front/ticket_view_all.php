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
				<h1 class="banner"> <?php echo $_POST['id']; ?> Liste des chapitres publiés :</h1>
			</section>

			<article>
				<h1> Titre de du chapitre : </h1>

				<section>
					<h2> Date : </h2>
				</section>
			</article>

		</main>

	</body>
</html>