<?php
	require('../core/Bdd_connexion.php');
	require('../core/Captcha.php');
	require('../src/model/Identification.php');

	class Backoffice {

		private $bddObj;
		private $login;
		private $connexion;
		private $pseudo;
		private $password;
		private $captcha;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->login = new Identification();
		 	$this->captcha = new Captcha();
		 	$this->connexion = $this->bddObj->Start();

		 	if(!empty($_POST['pseudo'])) {
		 		$this->pseudo = $_POST['pseudo'];
		 	}
		 	if(!empty($_POST['password'])) {
		 		$this->password = $_POST['password'];
		 	}
		 	if (!empty($_POST['vercode'])) {
		 		$this->code = $_POST['vercode'];
		 	}
	    }

	    function disconnection() {
	    	if(!empty($_SESSION['pseudo_user']) && !empty($_POST['disconnection_back'])) {

	    		// End the session
	    		$_SESSION = array();
				session_unset();
				session_destroy();
	    	}
	    }

	    function alreadylogIn() {
			if(!empty($_SESSION['pseudo_user'])) {
				// Load the view
				require('../src/view/back/backoffice_view.php');
			}
	    }

	    function logInConnexion() {

	    	// Check captcha
	    	if(!empty($this->code)) {
	    		$captchaCheck = $this->captcha->CapthcaValidator($this->code);
	    	}

	    	// The user accesses the page from the form
	    	if(!empty($_POST['submit_connexion']) && empty($_SESSION['pseudo_user']) && $captchaCheck ) {

	    		// We get the unique salt per user
				$salt = $this->login->Salt_user($this->pseudo, $this->connexion);

				// We encrypt the password
				$password_crypte = crypt($this->password, $salt);

				// Check the nickname and password entered
				$verification = $this->login->User_information($this->pseudo ,$password_crypte, $this->connexion);

				// Login information is correct
				if($verification[0] == 1) {
					// Check if the identifier is an admin or simple user then the stock in a variable $_SESSION
					$_SESSION['statut' ] = $this->login->User_statut($this->pseudo, $this->connexion);

					// Stock the identifier in a variable $_SESSION
					$_SESSION['pseudo_user'] = $this->pseudo;

					// Update the user ip
					$this->login->Ip_address_storage($this->pseudo, $this->connexion);

					// Load the view
					require('../src/view/back/backoffice_view.php');

				} // End verification

				// Login information is false
				else if($verification[0] != 1) {
					$_SESSION['error'] = "Erreur d'identification";

					// Redirect the user to the form
					header('location:backoffice');
				}
	    	} // End button checked

	    	// Captcha is false
			else if(isset($captchaCheck)) {

				$_SESSION['error'] = "Le code captcha n'est pas correct";
				require('../src/view/back/backoffice_connexion_view.php');
			}
	    	else if(empty($_SESSION['pseudo_user'])) {
	    		require('../src/view/back/backoffice_connexion_view.php');
	    	}

	    } // End function
	} // End class Backoffice


	// Object BackofficeBillet
	$objectBackoffice = new Backoffice();

	// Disconnection
	$objectBackoffice->disconnection();

	// The user is already logged in
	$objectBackoffice->alreadylogIn();

	// The user accesses the page from the form
	$objectBackoffice->logInConnexion();
?>