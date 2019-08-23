<?php
	class Identification
	{
		public function Salt_user($pseudo, $connexion)
		{
			$requete = $connexion->prepare('SELECT salt FROM compte WHERE pseudo = :pseudo');
			$requete->execute(array('pseudo' => $pseudo));
			$salt = $requete->fetch();

			return $salt['salt'];
		}

		public function Email_exist($email, $connexion)
		{
			// Select Email of account
			$requete = $connexion->prepare('SELECT email FROM compte WHERE email = :email');
			$requete->execute(array('email' => $email));
			$email = $requete->fetch();

			return $email['email'];
		}

		public function User_information($identifiant, $password_crypte, $connexion)
		{
			// Selection of corresponding pseudo and password
			$identification = $connexion->prepare('SELECT COUNT(*) FROM compte WHERE pseudo = :identifiant AND password = :password_crypte');

			// Execute the request
			$identification->execute(array('identifiant' => $identifiant, 'password_crypte' => $password_crypte));

			// Store the query in a variable
			$verification = $identification->fetch();

			// Returns the result number following the request
			return $verification[0];
		}


		public function User_statut($user, $connexion)
		{
			$requete = $connexion->prepare('SELECT statut FROM compte WHERE pseudo = :user');
			$requete->execute(array('user' => $user));
			$statut = $requete->fetch();

			return $statut['statut'];
		}


		public function Ip_address_storage($identifiant, $connexion)
		{
			// Ip address of the client
			$adresseIpClient = $_SERVER['REMOTE_ADDR'];

			// Request
			$insert = $connexion->prepare('UPDATE compte SET adresse_ip = ? WHERE pseudo = ? ');
			$insert->execute(array($adresseIpClient, $identifiant));
		}

		public function Change_password($newPassword, $salt, $email, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET password = ?, salt = ? WHERE email = ? ');
			$insert->execute(array($newPassword, $salt, $email));
		}


	} // End class Identification
?>