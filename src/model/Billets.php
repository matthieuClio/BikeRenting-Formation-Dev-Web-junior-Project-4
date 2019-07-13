<?php
	class Ticket {

		public function CheckNameTicket($nom, $connexion)
		{
			$requete = $connexion->prepare('SELECT nom FROM billet WHERE nom = :nom');
			$requete->execute(array('nom' => $nom));
			$nameTickets = $requete->fetch();

			return $nameTickets['nom'];
		}

		public function InsertTicket($nom, $texte, $connexion)
		{
			$requete = $connexion->prepare('INSERT INTO billet(nom, texte) VALUES(?, ?)');
			$requete->execute(array($nom, $texte));
		}

	} // End class Identification
?>