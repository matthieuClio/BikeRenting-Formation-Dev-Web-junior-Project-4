<?php
	require('../core/bdd_connexion.php');
	require('../src/model/Compte.php');

	class BackofficeAccountManage {

		private $bddObj;
		private $connexion;
		private $compteInfo;
		private $informations;
		private $id;

		// Constructor
		function __construct() {
			$this->bddObj = new bdd_connexion();
			$this->connexion = $this->bddObj->Start();
			$this->compteInfo = new Compte();
			$this->informations = [];

			
			// Form modification account
			if(!empty($_POST['id_account'])) {
				$this->id = $_POST['id_account'];
			}
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

		function AccountManageInformation() {
			// Get pseudo
			$informations[0] = 
				$this->compteInfo->Pseudo_account_id($this->id, $this->connexion);

			// Get email
			$informations[1] =
				$this->compteInfo->Email_account($informations[0], $this->connexion);

			// Return the account information user
			return $informations;
		}

		function AccountModify() {
	    	// Fields are fill
	    	if(!empty($_POST['edit_backoffice']) && !empty($_POST['pseudo_account']) && !empty($_POST['email_account'])) {

	    		// Password blank, update only pseudo and email
	    		if($this->password == '') {
	    			$this->compteInfo->Modify_account_id($this->pseudoPost, $this->email, $this->id, $this->connexion);

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
	    			$this->compteInfo->Modify_account_pasw_id($this->pseudoPost, $this->email, $newPassword, $salt, $this->id, $this->connexion);

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

	    function DeleteAccount() {
	    	// Delete user account
	    	if(!empty($_POST['delete_account_user'])) {
	    		$this->compteInfo->Delete_account($this->id, $this->connexion);
	    	}

	    	// Redirection
			header('location:backoffice/compte' );
		}
	} // End class BackofficeAccountManage

	// Object BackofficeAccount
	$objectBackofficeAccountManage = new BackofficeAccountManage();

	// Modification user account
	$objectBackofficeAccountManage->AccountModify();

	// Delete user account
	$objectBackofficeAccountManage->DeleteAccount();

	// Informations user account
	$informations = $objectBackofficeAccountManage->AccountManageInformation();

	// Display the view
	require('../src/view/back/backoffice_account_manage_view.php');
?>