<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_backoffice_view.php');?>
	</head>

	<body class="background_body">
		<main>
			<section class="connexion_section">
				<img src="public/images/photo/magi-book.png" alt="livre ouvert" class="image_connexion_bo">
				
				<form method="post" action="reinitialiser-mot-de-passe" class="connexion_form">
					
					<?php
						if(!empty($_SESSION['validation_restart']) &&  !empty($_POST['submit_connexion'])  ) {
							// Display error message
							echo '<p class="validation_restart_backoffice">'.$_SESSION['validation_restart'].'</p>';
						}
					?>

					<p class="connexion_p">
						Adresse e-mail :
					</p>
					<input type="email" name="email" class="input_connexion_bo" required>

					<p class="connexion_p">Code :</p>
					<figure class="connexion_p">
						<img src="core/capthcaPicture.php" class="captcha_resizing">
					</figure>
							
					<p class="connexion_p">
						Entrer le code :
					</p>
					<input type="text" name="vercode" required class="input_connexion_bo" onpaste="return false;" oncopy="return false;" id="code_input" maxlength="6"/>

					<div class="container_checkbox">
						<input type="submit" name="submit_connexion" value="Réinitialiser" class="button_style_blue">
					</div>

					<a href="backoffice" class="restart_password">Revenir à l'identification</a>
				</form>

				<div class="error_bo">
					<h3>
						<?php
							if(!empty($_SESSION['error_new_password']) && !empty($_POST['submit_connexion'])) {
								// Display error message
								echo $_SESSION['error_new_password'];
							}
						?>
					</h3>
				</div>
			</section>
		</main>
	</body>

</html>