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
				<h1 class="banner">Contact</h1>
			</section>

			<article class="article_view">
				<h2 class="title_article_view">Formulaire de contact </h2>
				
				<form method="post" action="contact" class="contact_form">
					<?php
						if(!empty($_POST['form_send']) && !empty($_SESSION['contact_email']) ) {
							// Display a validation message
							echo '<p>'.$_SESSION['contact_email'].'</p>';
						}
					?>
					Objet : <input type="text" name="subject" placeholder="Sujet de la prise de contact" required>
					Email : <input type="email" name="email" placeholder="Exemple : exemple@exemple.com" required>
					Commentaire : <textarea name="textarea_contact" rows="4"></textarea>
					<input type="submit" name="form_send" class="button_style_blue" value="Envoyer">
				</form>
			</article>
		</main>

	</body>
</html>