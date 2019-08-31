<?php
	require('../core/Bdd_connexion.php');
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

		function displayTicketNameEditorView() {
			$request = $this->ticketObj->displayEditortTicket($this->connexion);

			return $request;
	    }

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectTicket = new DisplayTicket();
	$requete = $objectTicket->ticketInfo();
	$requeteEditorName = $objectTicket->displayTicketNameEditorView();

	// Load the view
	require('../src/view/front/ticket_view.php');
?>