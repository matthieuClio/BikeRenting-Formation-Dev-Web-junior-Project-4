<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_backoffice_view.php');?>
	</head>

	<body class="background_body">
		<header class="header_backoffice">
			<figure class="container_img_backoffice">
				<img src="public/images/photo/magi-book.png" alt="livre ouvert">
			</figure>
		</header>

		<?php require('menu/menu_backoffice_view.php'); ?>

		<main class="contain_backoffice">
			<section id="information_popup_backoffice">
				<h2>Information popup</h2>
			</section>

			<h2 class="category_backoffice">Ajouter un billet</h2>

			<form method="post" action="backoffice/billets" class="contain_ticket_backoffice">
				<h2 class="title_ticket_backoffice">Ecrivez un billet</h2>

				<input type="text" name="name_ticket" class="name_ticket_backoffice" placeholder="Nom du billet" required>
				<textarea name="text_textarea"></textarea>
				<input type="submit" name="submit_connexion" class="ticket_button_backoffice button_style_blue" value="Enregistrer">
			</form>

			<h2 class="category_backoffice">Liste des billets</h2>

			<article class="ticket_listing_backoffice">
				<h2>Billets</h2>
				<section class="ticket_backoffice">

					<h3>Titre du billet :</h3>
					<span>
						<input type="button" name="edit_backoffice" class="edit_backoffice" value="Modifier">
						<input type="button" name="delete_backoffice" class="delete_backoffice" value="Supprimer">
					</span>
				</section>
			</article>
		</main>

		<footer>
		</footer>
	</body>
</html>