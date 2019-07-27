<?php
	require('../core/bdd_connexion.php');
	require('../src/model/Billets.php');

	class DisplayTicket {

		private $bddObj;
		private $ticketObj;
		private $connexion;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->ticketObj = new Ticket();
		 	$this->connexion = $this->bddObj->Start();
	    }

	    function ticketInfo() {
			$request = $this->ticketObj->displayAllTicket($this->connexion);

			return $request;
		}

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectTicket = new DisplayTicket();
	$requete = $objectTicket->ticketInfo();

	// Load the view
	require('../src/view/front/ticket_view.php');
?>