<?php
	require('../core/Bdd_connexion.php');
	require('../core/Captcha.php');
	require('../src/model/Identification.php');

	class RestartPassword {

		private $bddObj;
		private $email;
		private $captcha;
		private $code;
		private $login;
			
		// Constructor
		function __construct() {
			// Object
			$this->bddObj = new bdd_connexion();
			$this->captcha = new Captcha();
			$this->login = new Identification();
			$this->connexion = $this->bddObj->Start();

			if(!empty($_POST['email'])) {
				$this->email = $_POST['email'];
			}

			if(!empty($_POST['vercode'])) {
				$this->code = $_POST['vercode'];
			}
	    }

	    function backofficeChangePassword() {
	    	// Check captcha
	    	if(!empty($this->code)) {
	    		$captchaCheck = $this->captcha->CapthcaValidator($this->code);
	    	}

	    	// Check fields
	    	if(!empty($this->email) && !empty($this->code) && $captchaCheck) {

	    		// Check if the email exist in the data base
	    		$emailExist = $this->login->Email_exist($this->email, $this->connexion);

	    		// Email exist
	    		if($emailExist == $this->email) {
	    			
	    			// We define the unique salt per user
		    		$text = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 20);
		    		$salt = '$2a$07$'.$text.'$';

		    		// We define a password
		    		$password = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 5);

					// We encrypt the password
					$newPassword = crypt($password, $salt);

					// We update the new password in the database
					$this->login->Change_password($newPassword, $salt, $this->email, $this->connexion);

					// We send a email with the new password
		    		$to = $this->email;
			    	$subject = 'Réinitialisation du mot de passe';
			    	$textEmail = 'Votre nouveau mot de passe : '.$password;
			    	$from = 'Site Jean FORTEROCHE';

		    		mail($to, $subject, $textEmail, $from);

		    		// Message to display after the reset of password
		    		$_SESSION['validation_restart'] = 'Réinitialisation effectuée';
		    		$_SESSION['error_new_password'] = '';
	    		}
	    		else if($emailExist != $this->email) {
	    			$_SESSION['error_new_password'] = 'Vérifiez le mail';
	    			$_SESSION['validation_restart'] = '';
	    		}

	    	} // End check fields
	    	else if(!empty($this->code) && !$captchaCheck) {
	    		$_SESSION['error_new_password'] = 'Vérifiez le captcha entré';
	    		$_SESSION['validation_restart'] = '';
	    	}
	    }

	} // End class RestartPassword

	// Object RestartPassword
	$objectRestartPassword = new RestartPassword();
	$objectRestartPassword->backofficeChangePassword();

	// Load the view
	require('../src/view/back/restart_password_view.php');
?>