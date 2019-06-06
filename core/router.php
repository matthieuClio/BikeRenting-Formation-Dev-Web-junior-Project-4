<?php

	$url = '';

	if (isset($_GET['url']) ) 
	{
		$url = explode('/', $_GET['url']);
	}

	if ($url == '') 
	{
		require('../src/controller/accueil.php');
	}

	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'billets' && !empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_billet.php');
	}

	else if ($url[0] == 'backoffice' && !empty($_SESSION['pseudo_user']) || $url[0] == 'backoffice' && !empty($_POST['submit_connexion'])) 
	{
		require('../src/controller/backoffice.php');
	}

	else if ($url[0] == 'backoffice' && empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_connexion.php');
	}

	

	else 
	{
		echo 'Erreur 404';
	}
?>