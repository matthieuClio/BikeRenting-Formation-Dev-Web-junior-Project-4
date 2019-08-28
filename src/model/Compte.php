<?php
	class Compte
	{
		public function Check_email_account($email, $connexion)
		{
			// Select Email of account
			$requete = $connexion->prepare('SELECT email FROM compte WHERE email = :email');
			$requete->execute(array('email' => $email));
			$email = $requete->fetch();

			return $email['email'];
		}

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

		public function Modify_account_id($newPseudo, $email, $id, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET pseudo = ?, email = ? WHERE id = ?');
			$insert->execute(array($newPseudo, $email, $id));
		}

		public function Modify_account_pasw($newPseudo, $email, $password, $salt, $oldPseudo, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET pseudo = ?, email = ?, password = ?, salt = ? WHERE pseudo = ?');
			$insert->execute(array($newPseudo, $email, $password, $salt, $oldPseudo));
		}

		public function Modify_account_pasw_id($newPseudo, $email, $password, $salt, $id, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET pseudo = ?, email = ?, password = ?, salt = ? WHERE id = ?');
			$insert->execute(array($newPseudo, $email, $password, $salt, $id));
		}

		public function Creat_account_pasw($newPseudo, $email, $password, $salt, $connexion)
		{
			// Request
			$requete = $connexion->prepare('INSERT INTO compte(pseudo, email, password, salt, statut) VALUES(?, ?, ?, ?, "admin")');
			$requete->execute(array($newPseudo, $email, $password, $salt));
		}

		public function informationAllUsers($pseudo, $connexion)
		{
			// Request
			$requete = $connexion->prepare('SELECT * FROM compte WHERE pseudo != :pseudo');
			$requete->execute(array('pseudo' => $pseudo));

			return $requete;
		}

		public function Pseudo_account_id($id, $connexion)
		{
			// Select Pseudo of account
			$requete = $connexion->prepare('SELECT pseudo FROM compte WHERE id = :id');
			$requete->execute(array('id' => $id));
			$pseudo = $requete->fetch();

			return $pseudo['pseudo'];
		}

		public function Delete_account($id, $connexion)
		{
			$requete = $connexion->prepare('DELETE FROM compte WHERE id = :id');
			$requete->execute(array('id' => $id));
			$deleteAccount = $requete->fetch();
		}
	}
?>