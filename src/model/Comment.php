<?php
	class Comment {

		// Insert comment
		public function insertCommentMod($id_ticket, $pseudo, $text, $connexion)
		{
			$requete = $connexion->prepare('INSERT INTO commentaire(pseudo, texte, id_billet) VALUES(?, ?, ?)');
			$requete->execute(array($pseudo, $text, $id_ticket));
		}

		// Display comment
		public function displayCommentMod($id_ticket, $connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM commentaire WHERE id_billet = :id_ticket');
			$requete->execute(array('id_ticket' => $id_ticket));

			return $requete;
		}

		// Report comment
		public function reportCommentMod($id_comment, $connexion)
		{
			//UPDATE users SET name=?, surname=?, sex=? WHERE id=?";
			$requete = $connexion->prepare('UPDATE commentaire SET signale = "oui" WHERE id = ? AND signale != "oui" ');
			$requete->execute(array($id_comment));
		}

	} // End class Comment
?>