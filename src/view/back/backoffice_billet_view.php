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

		<nav class="menu_backoffice">
			<ul class="contain_menu_backoffice">
				<li class="tab_backoffice">
					<img src="public/images/icone/plume.png" alt="Icone plume" class="logo_tab_backoffice">
					<p class="text_tab_backoffice">Billets</p>
				</li>
				
				<li class="tab_backoffice">
					<img src="public/images/icone/plume.png" alt="Icone plume" class="logo_tab_backoffice">
					<p class="text_tab_backoffice">Test</p>
				</li>
			</ul>
		</nav>

		<main class="contain_backoffice">
			<section id="information_popup_backoffice">
				<h2>Information popup</h2>
			</section>

			<h2 class="category_backoffice">Ajouter un billet</h2>

			<form method="post" action="backoffice" class="contain_ticket_backoffice">
				<h2 class="title_ticket_backoffice">Ecrivez un billet</h2>

				<input type="text" name="name_ticket" class="name_ticket_backoffice" placeholder="Nom du billet" required>
				<textarea name="test_textarea"></textarea>
				<input type="submit" name="submit_connexion" class="ticket_button_backoffice button_style_blue" value="Enregistrer">
			</form>

			<h2 class="category_backoffice">Liste des billets</h2>
		</main>

		<footer>
		</footer>
	</body>
</html>