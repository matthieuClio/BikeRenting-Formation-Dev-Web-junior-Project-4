<?php
	class BackofficeAccueil {

		// Constructor
		function __construct() {
	    }

	    function backofficeAccueil() {
	    	// Load the view
			require('../src/view/front/accueil_view.php');
	    }
	} // End class BackofficeBillet

	// Object BackofficeBillet
	$objectBackofficeAccueil = new BackofficeAccueil();
	$objectBackofficeAccueil->backofficeAccueil();
?>