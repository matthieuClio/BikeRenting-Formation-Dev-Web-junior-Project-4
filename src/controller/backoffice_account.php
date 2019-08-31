<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Compte.php');

	class BackofficeAccount {

		private $bddObj;
		private $connexion;
		private $compteInfo;
		private $infoCompteUser;
		private $pseudoUser;

		private $pseudoPost;
		private $email;
		private $password;

		// Constructor
		function __construct() {

			$this->bddObj = new bdd_connexion();
			$this->connexion = $this->bddObj->Start();
			$this->compteInfo = new Compte();
			$this->infoCompteUser = [];
			$this->pseudoUser = $_SESSION['pseudo_user'];


			// Form modification account
			if(!empty($_POST['pseudo_account'])) {
				$this->pseudoPost = $_POST['pseudo_account'];
			}
			if(!empty($_POST['email_account'])) {
				$this->email = $_POST['email_account'];
			}
			if(!empty($_POST['password_account'])) {
				$this->password = $_POST['password_account'];
			}
			else if(empty($_POST['password_account'])) {
				$this->password = '';
			}

			// Form Creation account
			if(!empty($_POST['pseudo_account_new'])) {
				$this->pseudoNewAccount = $_POST['pseudo_account_new'];
			}
			if(!empty($_POST['email_account_new'])) {
				$this->emailNewAccount = $_POST['email_account_new'];
			}
			if(!empty($_POST['password_account_new'])) {
				$this->passwordNewAccount = $_POST['password_account_new'];
			}
	    }

	    function AccountInformation() {
	    	// Get pseudo
	    	$this->infoCompteUser[0] = 
	    			$this->compteInfo->Pseudo_account($this->pseudoUser, $this->connexion);

	    	// Get email
	    	$this->infoCompteUser[1] =
	    			$this->compteInfo->Email_account($this->pseudoUser, $this->connexion);

	    	// Return the account information user
	    	return $this->infoCompteUser;
	    }

	    function AccountModify() {
	    	// Fields are fill
	    	if(!empty($_POST['edit_backoffice']) && !empty($_POST['pseudo_account']) && !empty($_POST['email_account'])) {

	    		// Password blank, update only pseudo and email
	    		if($this->password == '') {
	    			$this->compteInfo->Modify_account($this->pseudoPost, $this->email, $this->pseudoUser, $this->connexion);

	    			// Modification of pseudo user session
	    			$_SESSION['pseudo_user'] = $this->pseudoPost;

	    			// Success message popup
	    			$_SESSION['popup_compte'] = "Modification réussi";
	    		}

	    		// Update pseudo, email and password
	    		else if ($this->password != '') {

	    			// We define the unique salt per user
		    		$text = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 20);
		    		$salt = '$2a$07$'.$text.'$';

		    		// We encrypt the password
					$newPassword = crypt($this->password, $salt);

					// We update the informations user
	    			$this->compteInfo->Modify_account_pasw($this->pseudoPost, $this->email, $newPassword, $salt, $this->pseudoUser, $this->connexion);

	    			// Modification of pseudo user session
	    			$_SESSION['pseudo_user'] = $this->pseudoPost;

	    			// Success message popup
	    			$_SESSION['popup_compte'] = "Modifiaction réussi";
	    		}
	    	}
	    	// Field missing
	    	else if(!empty($_POST['edit_backoffice']) && empty($_POST['pseudo_account']) && empty($_POST['email_account'])) {

	    		// Error message popup
	    		$_SESSION['popup_compte'] = "Vérifiez le pseudo et l'email";
	    	}
	    } // End AccountModify

	    function AccountCreation() {
	    	// Fields are fill
	    	if(!empty($_POST['creat_backoffice']) && !empty($_POST['pseudo_account_new']) && !empty($_POST['email_account_new']) && !empty($_POST['password_account_new'])) {

	    		// We define the unique salt per user
	    		$text = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 20);
	    		$salt = '$2a$07$'.$text.'$';

	    		// We encrypt the password
				$newPassword = crypt($this->passwordNewAccount, $salt);

				// Check if the pseudo is already use
				$checkPseudo = 
					$this->compteInfo->Pseudo_account($this->pseudoNewAccount, $this->connexion);

				// Check if the eamil is already use
				$checkEmail = 
					$this->compteInfo->Check_email_account($this->emailNewAccount, $this->connexion);

				// Check if pseudo is not used and same for the email
				if($this->pseudoNewAccount != $checkPseudo && $this->emailNewAccount != $checkEmail) {

					// Create the new account
					$this->compteInfo->Creat_account_pasw($this->pseudoNewAccount, $this->emailNewAccount, $newPassword, $salt, $this->connexion);

					// Success message popup
		    		$_SESSION['popup_compte'] = "Création réussi";
				}
				else if($this->pseudoNewAccount == $checkPseudo) {

					// Error message popup
		    		$_SESSION['popup_compte'] = "Le pseudo est déjà utilisé";
				}
				else if($this->emailNewAccount == $checkEmail) {

					// Error message popup
		    		$_SESSION['popup_compte'] = "L'email est déjà utilisé";
				}
	    	}

	    } // End the AccountCreation

	    function AccountUsers() {

	    	// Get informations of users
	    	$informationUsers = 
	    		$this->compteInfo->informationAllUsers($this->pseudoUser, $this->connexion);

	    	return $informationUsers;
	    }

	} // End class BackofficeAccount


	// Object BackofficeAccount
	$objectBackofficeAccount = new BackofficeAccount();

	// Modification of user informations
	$objectBackofficeAccount->AccountModify();

	// Creation of user
	$objectBackofficeAccount->AccountCreation();

	// Get information of all users
	$request = $objectBackofficeAccount->AccountUsers();

	// Get information of current user
	$informationAccount = $objectBackofficeAccount->AccountInformation();

	// Display the view
	require('../src/view/back/backoffice_account_view.php');
?>