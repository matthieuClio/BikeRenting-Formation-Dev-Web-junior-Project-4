<?php
	class Comment {

		// Insert comment
		public function insertcommentBdd($id_ticket, $pseudo, $text, $connexion)
		{
			$requete = $connexion->prepare('INSERT INTO commentaire(pseudo, texte, id_billet) VALUES(?, ?, ?)');
			$requete->execute(array($pseudo, $text, $id_ticket));
		}

	} // End class Comment
?>