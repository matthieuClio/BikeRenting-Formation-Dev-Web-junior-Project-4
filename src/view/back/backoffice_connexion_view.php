<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_backoffice_view.php');?>
	</head>

	<body class="background_body">
		<main>
			<section class="connexion_section">
				<img src="public/images/photo/magi-book.png" alt="livre ouvert" class="image_connexion_bo">
				
				<form method="post" action="backoffice" class="connexion_form">
					<p class="connexion_p">
						Identifiant :
					</p>
					<input type="text" name="pseudo" class="input_connexion_bo" required>

					<p class="connexion_p">
						Mot de passe :
					</p>
					<input type="password" name="password" class="input_connexion_bo" required>

					<p class="connexion_p">Code :</p>
					<figure class="connexion_p">
						<img src="core/capthcaPicture.php" class="captcha_resizing">
					</figure>
							
					<p class="connexion_p">Entrer le code :</p>
					<input type="text" name="vercode" required class="input_connexion_bo" onpaste="return false;" oncopy="return false;" id="code_input" maxlength="6"/>

					<div class="container_checkbox">
						
						<input type="submit" name="submit_connexion" value="Se connecter" class="input_submit_bo button_style_blue">
					</div>

					<a href="reinitialiser-mot-de-passe" class="restart_password">Mot de passe oublié ?</a>
				</form>

				<div class="error_bo">
					<h3>
						<?php if(!empty($_SESSION['error'])){ echo $_SESSION['error'];} ?>
					</h3>
				</div>
			</section>
		</main>
	</body>

</html>