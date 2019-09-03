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
				<h2 id="information_popup_backoffice_h2"><?php if(!empty($_SESSION['popup'])){ echo $_SESSION['popup']; $_SESSION['popup'] = "";} ?></h2>
			</section>

			<h2 id="add_ticket_backoffice_button_id" class="category_backoffice">Ajouter un billet</h2>

			<form method="post" action="backoffice/billets" id="add_ticket_backoffice_id" class="contain_ticket_backoffice">
				<h2 class="title_ticket_backoffice">Ecrivez un billet</h2>

				<input type="text" name="name_ticket" class="name_ticket_backoffice" placeholder="Nom du billet" required>
				<textarea name="text_textarea"></textarea>
				<input type="submit" name="submit_connexion" class="ticket_button_backoffice button_style_blue" id="ticket_button_backoffice_id" value="Enregistrer">
			</form>

			<h2 id="listing_ticket_backoffice_button_id" class="category_backoffice">Liste des billets</h2>

			<article id="listing_ticket_backoffice_id" class="ticket_listing_backoffice">
				<h2>Billets</h2>

					<?php
					while ($listingTickets = $request->fetch()) { 
						?>
						<form method="post" action="backoffice/billets/manage">
							<section class="ticket_backoffice">
								<h3>Titre du billet : <span class="title_color_backoffice"><?php echo $listingTickets['nom'];?></span></h3>
								<span>
									<input type="submit" name="display_backoffice" class="display_backoffice" value="Voir">
									<input type="submit" name="edit_backoffice" class="edit_backoffice" value="Modifier">
									<input type="submit" name="delete_backoffice" class="delete_backoffice" value="Supprimer">

									<input type="hidden" name="ticket_view" value="<?php echo $listingTickets['nom'];?>">
								</span>
							</section>
						</form>
					<?php 
					} ?>
			</article>
		</main>

		<?php require('js/js_load_backoffice_view.php');?>
	</body>
</html>