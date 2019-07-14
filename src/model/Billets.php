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
		public function insertTicket($nom, $texte, $connexion)
		{
			$requete = $connexion->prepare('INSERT INTO billet(nom, texte) VALUES(?, ?)');
			$requete->execute(array($nom, $texte));
		}

		// Display a ticket
		public function displayTicket($connexion)
		{
			$requete = $connexion->prepare('SELECT nom FROM billet ORDER BY id ASC');
			$requete->execute();

			return $requete;
		}

		// Display a specific ticket
		public function displaySpecificTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('SELECT texte FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$textTickets = $requete->fetch();

			return $textTickets['texte'];
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

		// Display a specific ticket
		public function deleteSpecificTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('DELETE FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$deleteTickets = $requete->fetch();
		}

	} // End class Identification
?>