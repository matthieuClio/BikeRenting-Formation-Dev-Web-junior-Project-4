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
				<h2 class="category_backoffice" id="information_compte_title">
					Informations du compte
				</h2>

				<form method="post" action="backoffice/compte" id="information_compte_container">
					Pseudo : 
					<input type="text" name="pseudo_account" value="<?php echo $informationAccount[0]; ?>" required>

					Email : 
					<input type="text" name="email_account" value="<?php echo $informationAccount[1]; ?>" required>

					Password :
					<p>
						(Laisser vide pour garder le même password)	
					</p>
					 <input type="password" name="password_account" placeholder="Mot de passe">

					<input type="submit" name="edit_backoffice" class="button_style_blue" value="Modifier">
				</form>
			</section>

			<h2 class="category_backoffice" id="manager_account_button">
				Compte manager
			</h2>

			<article id="manager_account_container" class="manager_account">
				<input type="button" class="button_style_blue modification_account_button" id="creat_compte_button" value="Créer un compte">

				<form method="post" action="backoffice/compte" class="creat_account" id="creat_compte_container">
					Pseudo :
					<input type="text" name="pseudo_account_new" required>

					Email :
					<input type="text" name="email_account_new" required>

					Password :
					<input type="password" name="password_account_new" placeholder="Mot de passe" required>

					<input type="submit" name="creat_backoffice" class="button_style_blue creat_account_button" value="Créer">
				</form>

				<section class="user_account">
					<h3>Comptes utilisateurs</h3>

					<?php
					while ($usersInformations = $request->fetch()) {
						?>
						<form method="post" action="backoffice/compte/manage">
							<p>
								Pseudo : 
								<span class="title_color_backoffice">
									<?php echo $usersInformations['pseudo']; ?>
								</span>
								Email :
								<span class="title_color_backoffice">
									<?php echo $usersInformations['email']; ?>
								</span>
							</p>
							
							<input type="submit" name="modification_account_user" class="edit_backoffice" value="Modifier">

							<input type="submit" name="delete_account_user" class="delete_backoffice" value="Supprimer">

							<input type="hidden" name="id_account" value="<?php echo $usersInformations['id'];?>">
						</form>
						<?php
					}
					?>
				</section>
			</article>
		</main>

		<?php include 'js/js_load_backoffice_view.php';?>	
	</body>
</html>