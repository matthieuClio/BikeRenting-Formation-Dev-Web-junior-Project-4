<?php
	class Ticket {
		
		// Check the name of ticket
		public function checkNameTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('SELECT nom FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$nameTickets = $requete->fetch();

			return $nameTickets['nom'];
		}

		// Insert a ticket
		public function insertTicket($nom, $userId, $texte, $connexion)
		{
			$dateTime = date("Y-m-d H:i:s");

			$requete = $connexion->prepare('INSERT INTO billet(nom, nom_redacteur, texte, date_time) VALUES(?, ?, ?, ?)');
			$requete->execute(array($nom, $userId, $texte, $dateTime));
		}

		// Check user id
		public function checkUserId($pseudo, $connexion)
		{
			$requete = $connexion->prepare('SELECT id FROM compte WHERE pseudo = :pseudo');
			$requete->execute(array('pseudo' => $pseudo));
			$idUser = $requete->fetch();

			return $idUser['id'];
		}

		// Display name of a ticket
		public function displayTicket($connexion)
		{
			$requete = $connexion->prepare('SELECT nom FROM billet ORDER BY id ASC');
			$requete->execute();

			return $requete;
		}

		// Display a specific ticket
		public function displaySpecificTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('SELECT texte, date_time FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$textTickets = $requete->fetch();
			$infoTicket = array($textTickets['texte'], $textTickets['date_time']);

			return $infoTicket;
		}

		// Get id of a ticket
		public function getIdTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('SELECT id FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$idTickets = $requete->fetch();

			return $idTickets['id'];
		}

		// Modify a specific ticket
		public function modifySpecificTicket($id, $nom, $texte, $connexion)
		{
			$requete = $connexion->prepare('UPDATE billet SET texte = :texte, nom = :nom WHERE id = :id');
			$requete->execute(array('texte' => $texte, 'nom' => $nom, 'id' => $id));
			$modifyTickets = $requete->fetch();
		}

		// Delete a specific ticket
		public function deleteSpecificTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('DELETE FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$deleteTickets = $requete->fetch();
		}

		// Display all tickets
		public function displayAllTicket($connexion)
		{
			$requete = $connexion->prepare('SELECT id, nom, texte, date_time FROM billet');
			$requete->execute();

			return $requete;
		}

		// Display all informations of a specific id
		public function idDisplayInfoTicket($id, $connexion)
		{
			$requete = $connexion->prepare('SELECT id, nom, texte, date_time FROM billet WHERE id = :id');
			$requete->execute(array('id' => $id));
			$infoTicket = $requete->fetch();

			return $infoTicket;
		}

		// Display name of a ticket
		public function displayEditortTicket($connexion)
		{
			$requete = $connexion->prepare('SELECT pseudo FROM `compte` join billet on billet.nom_redacteur = compte.id');
			$requete->execute();

			return $requete;
		}

	} // End class Ticket
?>