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

		// Display comment unreported
		public function displayUnreportedCommentMod($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM commentaire WHERE signale = "" ');
			$requete->execute();

			return $requete;
		}

		// Display reported comment
		public function displayReportedCommentMod($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM commentaire WHERE signale = "oui" ');
			$requete->execute();

			return $requete;
		}

		// Report comment
		public function reportCommentMod($id_comment, $connexion)
		{
			$requete = $connexion->prepare('UPDATE commentaire SET signale = "oui" WHERE id = ? AND signale != "oui" ');
			$requete->execute(array($id_comment));
		}

		// Unreport comment
		public function unreportCommentMod($id_comment, $connexion)
		{
			$requete = $connexion->prepare('UPDATE commentaire SET signale = "" WHERE id = ? ');
			$requete->execute(array($id_comment));
		}

		// Delete comment
		public function deleteCommentMod($id_comment, $connexion)
		{
			$requete = $connexion->prepare('DELETE FROM commentaire WHERE id = ?');
			$requete->execute(array($id_comment));
		}

		// Pseudo comment id
		public function pseudoCommentIdMod($id, $connexion)
		{
			$requete = $connexion->prepare('SELECT pseudo FROM commentaire WHERE id = ?');
			$requete->execute(array($id));
			$pseudo = $requete->fetch();

			return $pseudo['pseudo'];
		}

		// Pseudo comment
		public function pseudoCommentMod($pseudo, $connexion)
		{
			$requete = $connexion->prepare('SELECT pseudo FROM commentaire WHERE pseudo = ?');
			$requete->execute(array($pseudo));
			$pseudo = $requete->fetch();

			return $pseudo['pseudo'];
		}

	} // End class Comment
?>