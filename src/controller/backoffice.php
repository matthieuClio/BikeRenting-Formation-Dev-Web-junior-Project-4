<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Identification.php');

	// Objects
	$bdd = new Bdd_connexion();
	$login = new Identification();

	// Data base connexion
	$connexion = $bdd->Start();

	// The user is already logged in
	if(!empty($_SESSION['pseudo_user']))
	{
		// Load the view
		require('../src/view/back/backoffice_view.php');
		//echo 'deja connecte';
	}

	// The user accesses the page from the form
	else if(!empty($_POST['submit_connexion']))
	{
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];

		// We get the unique salt per user
		$salt = $login->Salt_user($pseudo, $connexion);

		// We encrypt the password
		$password_crypte = crypt($password, $salt);

		// Check the nickname and password entered
		$verification = $login->User_information($pseudo ,$password_crypte, $connexion);

		// Login information is correct
		if($verification[0] == 1)
		{
			// Check if the identifier is an admin or simple user then the stock in a variable $_SESSION
			$_SESSION['statut' ] = $login->User_statut($pseudo, $connexion);

			// Stock the identifier in a variable $_SESSION
			$_SESSION['pseudo_user'] = $pseudo;

			// Update the user ip
			$login->Ip_address_storage($pseudo, $connexion);

			// Load the view
			require('../src/view/back/backoffice_view.php');

		} // End verification

		// Login information is false
		else if($verification[0] != 1)
		{
			$_SESSION['error'] = "Erreur d'identification" ;

			// Redirect the user to the form
			header('location:backoffice');
		}

	} // End button checked
?>