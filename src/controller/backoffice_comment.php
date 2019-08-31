<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Comment.php');

	class BackofficeComment {

		private $bddObj;
		private $commentObj;
		private $connexion;
		private $ticketObj;
		private $unReportButton;
		private $ReportButton;
		private $deleteButton;
		private $idComment;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->commentObj = new Comment();
		 	$this->connexion = $this->bddObj->Start();

		 	if(!empty($_POST['unreport_com'])) {
		 		$this->unReportButton = $_POST['unreport_com'];
		 	}
		 	if(!empty($_POST['report_com'])) {
		 		$this->ReportButton = $_POST['report_com'];
		 	}
		 	if(!empty($_POST['delete_com'])) {
		 		$this->deleteButton = $_POST['delete_com'];
		 	}
		 	if(!empty($_POST['id_com'])) {
		 		$this->idComment = $_POST['id_com'];
		 	}
	    }

		function displayCommentBackoffcie() {
			// Display all comments reported
    		$requete = $this->commentObj->displayReportedCommentMod($this->connexion);

    		return $requete;
		}

		function displayUnreportedCommentBackoffcie() {
			// Display all comments unreported
    		$requete = $this->commentObj->displayUnreportedCommentMod($this->connexion);

    		return $requete;
		}

		function unReportButtonCommentBackoffcie() {
			// Unreport comment
			if(!empty($_POST['unreport_com'])) {
				$this->commentObj->unreportCommentMod($this->idComment, $this->connexion);
			}
		}

		function reportCommentBackoffcie() {
			// Delete comment
			if(!empty($_POST['report_com'])) {
    			$this->commentObj->reportCommentMod($this->idComment, $this->connexion);
    		}
		}

		function deleteButtonCommentBackoffcie() {
			// Delete comment
			if(!empty($_POST['delete_com'])) {
    			$this->commentObj->deleteCommentMod($this->idComment, $this->connexion);
    		}
		}

	} // End class BackofficeComment


	// Object BackofficeBilletFull
	$objectBackofficeComment = new BackofficeComment();

	// Reported comment
	$objectBackofficeComment->reportCommentBackoffcie();

	// Unreported comment
	$objectBackofficeComment->unReportButtonCommentBackoffcie();

	// Delete comment
	$objectBackofficeComment->deleteButtonCommentBackoffcie();

	// Display reported comment
	$requeteRep = $objectBackofficeComment->displayCommentBackoffcie();

	// Display unreported comment
	$requeteUnrep = $objectBackofficeComment->displayUnreportedCommentBackoffcie();

	// Load the view
	require('../src/view/back/backoffice_comment_view.php');
?>