<?php
	require('../core/bdd_connexion.php');
	require('../core/Captcha.php');
	require('../src/model/Billets.php');
	require('../src/model/Comment.php');

	class DisplayTicket {

		// Property
		private $bddObj;
		private $ticketObj;
		private $commentObj;
		private $connexion;
		private $captcha;
		private $code;
		private $id;
		private $idComment;
		private $pseudo;
		private $text;

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
		 	if (!empty($_POST['id_comment'])) {
		 		$this->idComment = $_POST['id_comment'];
		 	}
		 	if (!empty($_POST['vercode'])) {
		 		$this->code = $_POST['vercode'];
		 	}
	    }

	    function ticketInfo() {
			$request = $this->ticketObj->idDisplayInfoTicket($this->id ,$this->connexion);

			return $request;
		}

		function displayComment() {
			$request = $this->commentObj->displayCommentMod($this->id, $this->connexion);

			return $request;
		}

		function insertComment() {
			// Check form validation
			if(!empty($_SESSION['vercode']) && !empty($_POST['validator_button'])) {

				// Check captcha
				$captchaCheck = $this->captcha->CapthcaValidator($this->code);

				if($captchaCheck) {
					// Insert comment
					$this->commentObj->insertCommentMod($this->id, $this->pseudo, $this->text, $this->connexion);
				}
				else {
					$message = "Code captcha invalide";
					return $message;
				}
			}
		} // End function insertComment

		function reportComment() {
			if(!empty($_POST['report_button'])) {
				$this->commentObj->reportCommentMod($this->idComment, $this->connexion);
			}

		} // End function reportComment
	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectTicket = new DisplayTicket();

	// Display ticket if we got id ticket
	if(!empty($_POST['id'])) {

		// Display ticket informations
		$requeteTicket = $objectTicket->ticketInfo();

		// Report comment
		$objectTicket->reportComment();

		// Insert comment and get a message if the capthca is wrong
		$captchaMessage = $objectTicket->insertComment();

		// Display comment
		$requeteComment = $objectTicket->displayComment();

		// Load the view
		require('../src/view/front/ticket_view_all.php');
		
		// Create a local storage -localStorage.comment-
		?><script src="public/js/class/CommentStorageUser.js"></script><?php
	}
	else {
		// Location
		header('location:ticket');
	}
?>