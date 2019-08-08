<?php

	class ErrorPage {

		// Constructor
		function __construct() {
	    }

	    function displayPageError() {
		}

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectErrorPage = new ErrorPage();
	$objectErrorPage->displayPageError();

	// Load the view
	require('../src/view/front/404_page_view.php');
?>