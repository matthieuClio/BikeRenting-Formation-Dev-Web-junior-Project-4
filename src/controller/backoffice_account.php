<?php
	require('../core/bdd_connexion.php');
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
	    }

	    function AccountInformation() {

	    	// Get pseudo
	    	$this->infoCompteUser[0] = 
	    			$this->compteInfo->Pseudo_account($_SESSION['pseudo_user'], $this->connexion);

	    	// Get email
	    	$this->infoCompteUser[1] =
	    			$this->compteInfo->Email_account($_SESSION['pseudo_user'], $this->connexion);

	    	// Return the account information user
	    	return $this->infoCompteUser;
	    }

	    function AccountModify() {
	    	if(!empty($_POST['edit_backoffice']) && !empty($_POST['pseudo_account']) && !empty($_POST['email_account'])) {

	    		// Password blank, update only pseudo and email
	    		if($this->password == '') {
	    			$this->compteInfo->Modify_account($this->pseudoPost, $this->email, $this->pseudoUser, $this->connexion);

	    			// Modification of pseudo user session
	    			$_SESSION['pseudo_user'] = $this->pseudoPost;

	    			// Success message popup
	    			$_SESSION['popup_compte'] = "Modifiaction réussi";
	    		}

	    		// Update pseudo, email and password
	    		else if ($this->password != '') {

	    			// We define the unique salt per user
		    		$text = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 20);
		    		$salt = '$2a$07$'.$text.'$';

		    		// We encrypt the password
					$newPassword = crypt($this->password, $salt);

	    			$this->compteInfo->Modify_account_pasw($this->pseudoPost, $this->email, $newPassword, $salt, $this->pseudoUser, $this->connexion);

	    			// Modification of pseudo user session
	    			$_SESSION['pseudo_user'] = $this->pseudoPost;

	    			// Success message popup
	    			$_SESSION['popup_compte'] = "Modifiaction réussi";
	    		}
	    	}
	    	else if(!empty($_POST['edit_backoffice']) && empty($_POST['pseudo_account']) && empty($_POST['email_account'])) {

	    		// Error message popup
	    		$_SESSION['popup_compte'] = "Vérifiez le pseudo et l'email";
	    	}
	    }

	} // End class BackofficeBillet

	// Object BackofficeBillet
	$objectBackofficeAccount = new BackofficeAccount();

	// Modification of user informations
	$objectBackofficeAccount->AccountModify();

	// Get information of user
	$informationAccount = $objectBackofficeAccount->AccountInformation();

	// Display the view
	require('../src/view/back/backoffice_account_view.php');
?>