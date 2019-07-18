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
			<article class="ticket_backoffcie_view">
				<section>
					<h2 class="ticket_backoffcie_view_title">
						Titre du billet : 
						<span class="title_color_backoffice"> 
							<?php if(!empty($_POST['ticket_view'])) {echo $_POST['ticket_view']; }?>
						</span>
					</h2>
				</section>

				<section>
					<h2 class="ticket_backoffcie_view_title">
						Date du billet : 
						<span class="title_color_backoffice">
							<?php echo $request[1]; ?>
							<span class="title_color_backoffice">
					</h2>
				</section>

				<section>
					<h2 class="ticket_backoffcie_view_title"> Texte du billet : </h2>
					<div class="ticket_backoffcie_view_text"><?php echo $request[0]; ?></div>
				</section>
			</article>

		</main>

		<footer>
		</footer>
	</body>
</html>