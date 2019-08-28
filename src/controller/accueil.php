<?php
	require('../core/bdd_connexion.php');
	require('../src/model/Accueil.php');

	class BackofficeAccueil {
		// Property
		private $bddObj;
		private $ticketObj;
		private $connexion;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->ticketObj = new Accueil();
		 	$this->connexion = $this->bddObj->Start();
	    }

	    function backofficeAccueilTicket() {
			$request = $this->ticketObj->displayTicketAccueil($this->connexion);

			return $request;
	    }

	    function backofficeAccueilNameEditor() {
			$request = $this->ticketObj->displayEditortAccueil($this->connexion);

			return $request;
	    }
	} // End class BackofficeBillet

	// Object BackofficeBillet
	$objectBackofficeAccueil = new BackofficeAccueil();
	$requete = $objectBackofficeAccueil->backofficeAccueilTicket();
	$requeteEditorName = $objectBackofficeAccueil->backofficeAccueilNameEditor();

	// Load the view
	require('../src/view/front/accueil_view.php');
?>