<?php

	class AuthorPage {

		// Constructor
		function __construct() {
	    }

	    function displayPageAuthor() {
		    // Load the view
			require('../src/view/front/author_page_view.php');
		}
	} // End class AutorPage


	// Object BackofficeBillet
	$objectAutorPage = new AuthorPage();
	$objectAutorPage->displayPageAuthor();

	
?>