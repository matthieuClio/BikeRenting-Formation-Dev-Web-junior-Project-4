<?php
	class BackofficeConnexion {

		// Constructor
		function __construct() {
	    }

	    function backofficeConnexion() {
	    	// Load the view
			require('../src/view/back/backoffice_connexion_view.php');
	    }

	} // End class BackofficeBillet

	// Object BackofficeBillet
	$objectBackofficeConnexion = new BackofficeConnexion();
	$objectBackofficeConnexion->backofficeConnexion();
?>