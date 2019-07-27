<?php
	/* ROUTER WILL BE A OBJECT
	class Backoffice {

		private $url;
		private $urlTicket;
		private $urlChapter;
		private $urlBackoffice;
		private $urlTicketsFr;

		// Constructor
		function __construct() {

		 	$this->url = '';
		 	$this->url = 'ticket';
		 	$this->urlChapter = 'chapitre';
		 	$this->urlBackoffice = 'backoffice';

		 	if(!empty($_SESSION['pseudo_user'])) {
				$this->url = $_SESSION['pseudo_user'];
		 	}
	    }
	} // End class Backoffice

	*/

	$url = '';

	if (isset($_GET['url']) )
	{
		$url = explode('/', $_GET['url']);
	}

	if ($url == '') 
	{
		require('../src/controller/accueil.php');
	}

	else if ($url[0] == 'ticket') 
	{
		require('../src/controller/displayTicket.php');
	}

	else if ($url[0] == 'chapitre') 
	{
		require('../src/controller/billet_front_full.php');
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