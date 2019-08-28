<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include 'header/header_backoffice_view.php'; ?>
	</head>

	<body class="background_body">
		<header class="header_backoffice">
			<figure class="container_img_backoffice">
				<img src="public/images/photo/magi-book.png" alt="livre ouvert">
			</figure>
		</header>

		<?php include 'menu/menu_backoffice_view.php'; ?>

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
				<h2 class="category_backoffice">
					Informations du compte
				</h2>

				<form method="post" action="backoffice/compte/manage">
					Pseudo : 
					<input type="text" name="pseudo_account" value="<?php echo $informations[0]; ?>" required>

					Email : 
					<input type="text" name="email_account" value="<?php echo $informations[1]; ?>" required>

					Password :
					<p>
						(Laisser vide pour garder le même password)	
					</p>
					 <input type="password" name="password_account" placeholder="Mot de passe">

					<input type="submit" name="edit_backoffice" class="button_style_blue" value="Modifier">

					<input type="hidden" name="id_account" value="<?php echo $_POST['id_account'];?>">
				</form>
			</section>

		</main>

		<?php include 'js/js_load_backoffice_view.php';?>
	</body>
</html>