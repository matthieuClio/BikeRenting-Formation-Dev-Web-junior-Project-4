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

	else if ($url[0] == 'reinitialiser-mot-de-passe')
	{
		require('../src/controller/backoffice_restart_password.php');
	}

	else if ($url[0] == 'contact') 
	{
		require('../src/controller/contact.php');
	}

	else if ($url[0] == 'ticket') 
	{
		require('../src/controller/displayTicket.php');
	}

	else if ($url[0] == 'chapitre') 
	{
		require('../src/controller/billet_front_full.php');
	}

	else if ($url[0] == 'auteur')
	{
		require('../src/controller/author.php');
	}

	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'billets' && !empty($url[2]) && $url[2] == 'manage' && !empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_billet_full.php');
	}

	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'billets' && !empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_billet.php');
	}

	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'commentaire' && !empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_comment.php');
	}

	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'compte' && !empty($url[2]) && $url[2] == 'manage' && !empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_account_manage.php');
	}

	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'compte' && !empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_account.php');
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
		require('../src/controller/error_page.php');
	}
?>