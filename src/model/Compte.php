<?php
	class Compte
	{
		public function Email_account($pseudo, $connexion)
		{
			// Select Email of account
			$requete = $connexion->prepare('SELECT email FROM compte WHERE pseudo = :pseudo');
			$requete->execute(array('pseudo' => $pseudo));
			$email = $requete->fetch();

			return $email['email'];
		}

		public function Pseudo_account($pseudo, $connexion)
		{
			// Select Pseudo of account
			$requete = $connexion->prepare('SELECT pseudo FROM compte WHERE pseudo = :pseudo');
			$requete->execute(array('pseudo' => $pseudo));
			$pseudo = $requete->fetch();

			return $pseudo['pseudo'];
		}

		public function Modify_account($newPseudo, $email, $oldPseudo, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET pseudo = ?, email = ? WHERE pseudo = ?');
			$insert->execute(array($newPseudo, $email, $oldPseudo));
		}

		public function Modify_account_pasw($newPseudo, $email, $password, $salt, $oldPseudo, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET pseudo = ?, email = ?, password = ?, salt = ? WHERE pseudo = ?');
			$insert->execute(array($newPseudo, $email, $password, $salt, $oldPseudo));
		}
	}
?>