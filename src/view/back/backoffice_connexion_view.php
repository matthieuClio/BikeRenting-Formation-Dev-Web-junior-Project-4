<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_backoffice_view.php'); ?>
	</head>

	<body class="background_body">
		<main>
			<section class="connexion_section">
				<img src="../../public/images/photo/magi-book.png" alt="livre ouvert" class="image_connexion_bo">
				
				<form method="post" action="backoffice.php" class="connexion_form">
					<p class="connexion_p">
						Identifiant ou adresse e-mail
					</p>
					<input type="text" name="pseudo" class="input_connexion_bo" required>

					<p class="connexion_p">
						Mot de passe
					</p>
					<input type="password" name="password" class="input_connexion_bo" required>

					<p class="connexion_p">
						Captcha (fonction à developper)
					</p>

					<div class="container_checkbox">
						<input type="checkbox" name="password" class="input_checkbox_bo">

						<p class="checkbox_p">
							Se souvenir de moi
						</p>

						<input type="submit" name="submit_connexion" value="Se connecter" class="input_submit_bo button_style_blue">
					</div>
				</form>
			</section>
		</main>
	</body>
</html>