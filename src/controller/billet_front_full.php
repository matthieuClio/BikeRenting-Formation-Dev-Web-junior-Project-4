<?php
	require('../core/bdd_connexion.php');
	require('../src/model/Billets.php');

	class DisplayTicket {

		public $bddObj;
		public $ticketObj;
		public $connexion;

		public $id;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->ticketObj = new Ticket();
		 	$this->connexion = $this->bddObj->Start();

		 	$this->id = $_POST['id'];
	    }

	    function ticketInfo() {
			$request = $this->ticketObj->idDisplayInfoTicket($this->id ,$this->connexion);

			return $request;
		}

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectTicket = new DisplayTicket();
	$requete = $objectTicket->ticketInfo();

	// Load the view
	require('../src/view/front/ticket_view_all.php');
?>