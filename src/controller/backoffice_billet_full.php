<?php
	require('../core/bdd_connexion.php');
	require('../src/model/Billets.php');

	class BackofficeBilletFull {

		private $bddObj;
		private $ticketObj;
		private $connexion;

		private $nameTicketPost;
		private $textTicketPost;
		private $idTicket;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->ticketObj = new Ticket();
		 	$this->connexion = $this->bddObj->Start();

		 	if(!empty($_POST['display_backoffice'])) {
		 		$this->nameTicketPost = $_POST['ticket_view'];
		 	}

		 	else if(!empty($_POST['delete_backoffice'])) {
		 		$this->nameTicketPost = $_POST['ticket_view'];
		 	}

		 	else if(!empty($_POST['edit_backoffice'])) {
		 		$this->nameTicketPost = $_POST['ticket_view'];

		 		if(!empty($_POST['text_textareaModify'])) {
		 			$this->textTicketPost = $_POST['text_textareaModify'];
		 		}
		 	}
		 	
	    }

	    function displayTicketFull() {
	    	if(!empty($_POST['display_backoffice']) || !empty($_POST['edit_backoffice'])) {
				// Display ticket text
				$request = $this->ticketObj->displaySpecificTicket($this->nameTicketPost, $this->connexion);

				return $request;
			}
		}

		function modifyTicketFull() {
	    	if(!empty($_POST['modify_backoffice_full'])) {

				// Modify the ticket
				$requestModify = $this->ticketObj->modifySpecificTicket($this->idTicket, $this->nameTicketPost, $this->textTicketPost, $this->connexion);

				// Redirection
				header('location:backoffice/billets' );
			}
		}

		function deleteTicket() {
			if(!empty($_POST['delete_backoffice'])) {

				// Function Delete of Ticket object
				$this->ticketObj->deleteSpecificTicket($this->nameTicketPost, $this->connexion);

				// Redirection
				header('location:backoffice/billets' );
			}
		}

		function idTicket() {

			if(!empty($_POST['id_ticket_backoffice_full'])) {
				$this->idTicket = $_POST['id_ticket_backoffice_full'];
			}
			else {
				// Get the id
	    		$this->idTicket = $this->ticketObj->getIdTicket($this->nameTicketPost, $this->connexion);
			}

	    	return $this->idTicket;
		}


	} // End class BackofficeBilletFull


	// Object BackofficeBilletFull
	$objectBackofficeBillet = new BackofficeBilletFull();

	// Get the ticket id
	$requestId = $objectBackofficeBillet->idTicket();

	// Modify ticket
	$objectBackofficeBillet->modifyTicketFull();

	// Ticket text
	$request = $objectBackofficeBillet->displayTicketFull();

	// Delete ticket
	$objectBackofficeBillet->deleteTicket();

	if(!empty($_POST['edit_backoffice'])) {
		// Load the view ticket modify
		require('../src/view/back/backoffice_billet_view_full_modify.php');
	}
	else {
		// Load the view ticket
		require('../src/view/back/backoffice_billet_view_full.php');
	}
?>