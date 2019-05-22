<?php

	$url = '';

	if (isset($_GET['url']) ) {
		$url = explode('/', $_GET['url']);
	}

	if ($url == '') {
		require('../src/controller/accueil.php');
	}

	else if ($url[0] == 'backoffice' ) {
		require('../src/controller/backoffice.php');
	}

	else {
		echo 'Erreur 404';
	}
?>