<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_backoffice_view.php'); ?>
	</head>

	<body class="background_body">
		<header class="header_backoffice">
			<figure class="container_img_backoffice">
				<img src="public/images/photo/magi-book.png" alt="livre ouvert">
			</figure>
		</header>

		<?php require('menu/menu_backoffice_view.php'); ?>

		<main class="contain_backoffice">
			<?php 
				if(!empty($_SESSION['popup_compte'])) {
					?>
					<section id="information_popup_backoffice">
						<h2 id="information_popup_backoffice_h2">
							<?php
								echo $_SESSION['popup_compte'];
								$_SESSION['popup_compte'] = "";
							?>
						</h2>
					</section>
					<?php
				}
			?>
			<section class="account_information">
				<h2 class="category_backoffice">Informations</h2>

				<form method="post" action="backoffice/compte">
					Pseudo : <input type="text" name="pseudo_account" value="<?php echo $informationAccount[0]; ?>" required>

					Email : <input type="text" name="email_account" value="<?php echo $informationAccount[1]; ?>" required>

					Password :
					<p>
						(Laisser vide pour garder le même password)	
					</p>
					 <input type="password" name="password_account" placeholder="Mot de passe">

					<input type="submit" name="edit_backoffice" class="button_style_blue" value="Modifier">
				</form>
			</section>
		</main>

		<?php require('js/js_load_backoffice_view.php');?>
	</body>
</html>