<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Billets.php');

	class BackofficeBillet {

		public $bdd;
		public $ticket_obj;

		public $nameTicketPost;
		public $textTicketPost;

		// Constructor
		function __construct() {
		 	$this->bdd = new Bdd_connexion();
		 	$this->ticket_obj = new Ticket();

		 	if(!empty($_POST['submit_connexion'])) {
		 		$this->nameTicketPost = $_POST['name_ticket'];
		 		$this->textTicketPost = $_POST['text_textarea'];
		 	}
	    }

		function addTicket() {
			if(!empty($_POST['submit_connexion'])) {

				$bdd = new Bdd_connexion();
				$ticket_obj = new Ticket();

				$this->nameTicketPost = $_POST['name_ticket'];
				$this->textTicketPost = $_POST['text_textarea'];

				// Data base connexion
				$connexion = $this->bdd->Start();

				// Check name
				$nameTicket = $this->ticket_obj->CheckNameTicket($this->nameTicketPost ,$connexion);

				if(empty($nameTicket) && !empty($this->textTicketPost)) {
					?> <!--<script type="text/javascript"> console.log('ticket ok') </script>--> <?php
					//$ticket_obj->InsertTicket($nameTicketPost, $textTicketPost, $connexion);
				}
				else if(!empty($nameTicket)) {
					?> <!--<script type="text/javascript"> console.log('Nom déjà pris') </script> --><?php
				}
				else if(empty($this->textTicketPost)) {
					?><!-- <script type="text/javascript"> console.log('textTicketPost vide') </script>--> <?php
				}
			}

		} // End function addTicket

		function displayTicket() {
			?><!-- <script type="text/javascript">console.log('ok');</script>--> <?php
		}

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeBillet = new BackofficeBillet();
	$objectBackofficeBillet->addTicket();
	$objectBackofficeBillet->displayTicket();
	// Load the view
	require('../src/view/back/backoffice_billet_view.php');


	/*
	// argument à insérer		
	$colonne= array('pseudo', 'nom_article', 'commentaire', 'date_commentaire');	// nom des champs de la table ex: SELECT $colonne
	$table= 'commentaire';
	$condition= array('?', '?', '?', '?');	// condition ex: WHERE ... = $condition
	$donne_post= array($_SESSION['identifiant_user'], $_POST['nom_article'], $_POST['commentaire'], $date);

	// appel de la fonction
	$test= $objet_bdd->UltimeInsert($colonne, $table, $condition, $donne_post, $connexion);
	$complementExe= $test[1]; // stock les conditions complété
	$test[0]->execute($complementExe);
	*/
?>