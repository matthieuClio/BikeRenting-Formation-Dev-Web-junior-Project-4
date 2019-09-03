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
				<h1 class="banner">"Billet simple pour l'Alaska"</h1>
			</section>

			<article class="article_view">
				<h2 class="title_article_view">Roman de Jean Forteroche </h2>
				<p class="text_article_view">
					Sur ce site retrouvez les différents chapitre du roman "Billet simple pour l'Alaska", écrit par Jean Forteroche.
				</p>
			</article>

			<div class="article_ticket_view">
				<?php
				while($allTickets = $requete->fetch()) {

					// Name of editor
					$editorName = $requeteEditorName->fetch();
					?>
					<div class="ticket_view">
						<figure>
							<img src="public/images/photo/vignette.png" class="ticket_view_background" alt="Image de fond">
						</figure>

						<section>
							<form method="post" action="chapitre">
								<h2><?php echo $allTickets['nom']; ?></h2>
								<p><?php  echo $allTickets['date_time'];?></p>
								<p><?php echo '['.$editorName['pseudo'].']'; ?></p>

								<input type="submit" name="valider" class="ticket_view_button button_style_blue" value="Voir">

								<input type="hidden" name="id" value="<?php echo $allTickets['id'];?>">
							</form>
						</section>
					</div>
					<?php
				}
				?>
			</div>
		</main>

		<!-- Footer -->
		<?php include'footer/footer_view.php'; ?>
	</body>

</html>