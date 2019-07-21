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
			<section id="information_popup_backoffice">
				<h2>Information popup</h2>
			</section>

			<section>
				<h2 class="category_backoffice">Commentaire signalé :</h2>

				<?php 
				while($reportedComment = $requeteRep->fetch()) { ?>
					<div class="reported_comment">
						<p>
							Pseudo : 
							<span class="title_color_backoffice">
								<?php echo $reportedComment['pseudo'];?>
							</span>
						</p>
						<p>
							Commentaire :
							<span class="title_color_backoffice">
								<?php echo $reportedComment['texte'];?>
							</span>
						</p>

						<form method="post" action="backoffice/commentaire">
							<input type="submit" name="unreport_com" class="edit_backoffice" value="Enlever le signalement">
							<input type="submit" name="delete_com" class="delete_backoffice" value="Supprimer">

							<input type="hidden" name="id_com" value="<?php echo $reportedComment['id']; ?>">
						</form>
					</div>
					<?php
				} ?>
			</section>

			<section>
				<h2 class="category_backoffice">Commentaire non signalé :</h2>

				<?php 
				while($unreportedComment = $requeteUnrep->fetch()) { ?>
					<div class="reported_comment">
						<p>
							Pseudo : 
							<span class="title_color_backoffice">
								<?php echo $unreportedComment['pseudo'];?>
							</span>
						</p>
						<p>
							Commentaire :
							<?php echo $unreportedComment['texte'];?>
						</p>

						<form method="post" action="backoffice/commentaire">
							<input type="submit" name="report_com" class="edit_backoffice" value="Signaler">
							<input type="submit" name="delete_com" class="delete_backoffice" value="Supprimer">

							<input type="hidden" name="id_com" value="<?php echo $unreportedComment['id']; ?>">
						</form>
					</div>
					<?php
				} ?>
			</section>
		</main>
	</body>
</html>