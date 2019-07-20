<?php
	require('../core/bdd_connexion.php');
	require('../core/Captcha.php');
	require('../src/model/Billets.php');
	require('../src/model/Comment.php');

	class DisplayTicket {

		// Property
		public $bddObj;
		public $ticketObj;
		public $commentObj;
		public $connexion;
		public $captcha;
		public $code;
		public $id;
		public $pseudo;
		public $text;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->ticketObj = new Ticket();
		 	$this->commentObj = new Comment();
		 	$this->captcha = new Captcha();
		 	$this->connexion = $this->bddObj->Start();

		 	if(!empty($_POST['id'])) {
		 		$this->id = $_POST['id'];
		 	}
		 	if(!empty($_POST['pseudo'])) {
		 		$this->pseudo = $_POST['pseudo'];
		 	}
		 	if(!empty($_POST['text_comment'])) {
		 		$this->text = $_POST['text_comment'];
		 	}
		 	if (!empty($_POST['vercode'])) {
		 		$this->code = $_POST['vercode'];
		 	}
	    }

	    function ticketInfo() {
			$request = $this->ticketObj->idDisplayInfoTicket($this->id ,$this->connexion);

			return $request;
		}

		function insertComment() {
			// Check form validation
			if(!empty($_SESSION['vercode']) && !empty($_POST['validator_button'])) {

				// Check captcha
				$captchaCheck = $this->captcha->CapthcaValidator($this->code);

				if($captchaCheck) {
					// Insert comment
					$this->commentObj->insertcommentBdd($this->id, $this->pseudo, $this->text, $this->connexion);
				}
				else {
					$Message = "Code captcha invalide";
					return $Message;
				}
			}

		} // End function insertComment

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectTicket = new DisplayTicket();

	// Display ticket if we got id ticket
	if(!empty($_POST['id'])) {
		$requete = $objectTicket->ticketInfo();

		// Get message if the capthca is wrong or success
		$captchaMessage = $objectTicket->insertComment();

		// Load the view
		require('../src/view/front/ticket_view_all.php');
	}
	else {
		// Redirection
		header('location:ticket');
	}
?>