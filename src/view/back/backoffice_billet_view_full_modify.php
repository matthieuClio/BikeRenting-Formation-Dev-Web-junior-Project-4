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
				<form method="post" action="">
					<section>
						<h2 class="ticket_backoffcie_view_title"> 
							Titre du billet : <input type="text" name="ticket_view" required value="<?php if(!empty($_POST['ticket_view'])) {echo $_POST['ticket_view']; }?>">
						</h2>
					</section>

					<section>
						<h2 class="ticket_backoffcie_view_title"> Billet : </h2>
							<textarea name="text_textareaModify"><?php echo $request; ?></textarea>
							<input type="submit" name="modify_backoffice_full" class="modify_button_backoffice edit_backoffice" value="Modifier">

							<input type="hidden" name="edit_backoffice" value="modify">
							<input type="hidden" name="id_ticket_backoffice_full" value="<?php echo $requestId; ?>">
					</section>
				</form>
			</article>
		</main>
	</body>

	<footer>
	</footer>
</html>