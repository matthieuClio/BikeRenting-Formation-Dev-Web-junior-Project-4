<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include'header/header_view.php'; ?>
	</head>

	<body>
		<header>
			<!-- Menu -->
			<?php include'menu/menu_view.php'; ?>

			<!-- Slider -->
			<div class="slider">
				<img src="public/images/slider/fond.jpg" alt="Image de couverture">
				<span class="filter"></span>
			</div>
		</header>

		<main>
			<section>
				<h1 class="banner">Liste des chapitres publiés :</h1>
			</section>

			<article class="ticket_view_all_article">
				<h1> Titre du chapitre : 
					<span class="title_color_backoffice">
						<?php if(!empty($requeteTicket['nom'])){echo $requeteTicket['nom'];}?>
					</span>
				</h1>

				<section class="text_align_max_width">
					<h2> Date : 
						<span class="title_color_backoffice">
							<?php 
								if(!empty($requeteTicket['date_time'])) {
									echo $requeteTicket['date_time'];
								}
							?>
						</span>
					</h2>

					<div class="ticket_view_all_text">
						<?php 
							if(!empty($requeteTicket['texte'])) {
								echo $requeteTicket['texte'];
							}
						?>	
					</div>
				</section>
			</article>

			<section class="ticket_view_all_com">
				<h2>Espace commentaire</h2>
				<div>
					<?php
					while($dataComment = $requeteComment->fetch()) { ?>

						<section class="commentary_section_view_all text_align_max_width">
							<h3>Pseudo : <?php  echo $dataComment['pseudo'];?></h3>
							<form method="post" action="chapitre">

								<!-- Id ticket of comment -->
								<input type="hidden" name="id_comment" value="<?php echo $dataComment['id'];?>">
								<!-- Id ticket -->
								<input type="hidden" name="id" value="<?php if(!empty($_POST['id'])){ echo $_POST['id']; }?>">

								<p><?php echo $dataComment['texte']; ?></p>
								
								<input type="submit" name="report_button" id="<?php echo $dataComment['id'];?>" class="button_style_blue" value="Signaler ce commentaire">
							</form>
						</section>
						<?php
					} ?>

					<section class="commentary_form_view_all">
						<h3>Laisser un commentaire</h3>

						<!-- Display message -->
						<span class="error_messages">
							<?php
								if(!empty($captchaMessage)) {
									echo $captchaMessage;
								}
								else if(!empty($commentMessage)) {
									echo $commentMessage;
								}
							?>
						</span>
						
						<form method="post" action="chapitre">
							Pseudo : <input type="text" name="pseudo" class="input_text" placeholder="Pseudo" required>
							<textarea name="text_comment"></textarea>

							Code :
							<figure>
								<img src="core/capthcaPicture.php" class="captcha_resizing" alt="captcha">
							</figure>
							
							Entrer le code :
							<input type="text" name="vercode" class="input_text" required placeholder="Code" id="code_input" maxlength="6"/>
							
							<input type="submit" name="validator_button" class="button_style_blue" value="Soumettre">
							<input type="hidden" name="id" value="<?php if(!empty($_POST['id'])){ echo $_POST['id']; }?>">
						</form>
					</section>
				</div>
			</section>
		</main>
		<?php include 'js/js_load_view.php';?>	
	</body>

	<!-- Footer -->
	<?php include'footer/footer_view.php'; ?>
</html>