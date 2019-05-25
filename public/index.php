<?php

	$url = '';

	if (isset($_GET['url']) ) {
		$url = explode('/', $_GET['url']);
	}

	if ($url == '') {
		require('../src/controller/accueil.php');
	}

	else if ($url[0] == 'backoffice' AND empty($_POST['submit_connexion'])) {
		require('../src/controller/backoffice_connexion.php');
	}
	else if ($url[0] == 'backoffice' AND !empty($_POST['submit_connexion'])) {
		require('../src/controller/backoffice.php');
	}

	else {
		echo 'Erreur 404';
	}
?>