<?php
	// Load the models that we need
	require('../src/model/Data_base.php');

	// Load the view
	require('../src/view/back/backoffice_view.php');

	// argument à insérer		
		$colonne= array('pseudo', 'nom_article', 'commentaire', 'date_commentaire');	// nom des champs de la table ex: SELECT $colonne
		$table= 'commentaire';
		$condition= array('?', '?', '?', '?');	// condition ex: WHERE ... = $condition
		$donne_post= array($_SESSION['identifiant_user'], $_POST['nom_article'], $_POST['commentaire'], $date);

	// appel de la fonction
		$test= $objet_bdd->UltimeInsert($colonne, $table, $condition, $donne_post, $connexion);
		$complementExe= $test[1]; // stock les conditions complété
		$test[0]->execute($complementExe);

?>