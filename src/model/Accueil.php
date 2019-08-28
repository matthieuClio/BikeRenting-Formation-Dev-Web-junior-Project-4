<?php
	class Accueil {

		// Display name of a ticket
		public function displayTicketAccueil($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM billet ORDER BY id ASC LIMIT 0, 3');
			$requete->execute();

			return $requete;
		}

		// Display name of a ticket
		public function displayEditortAccueil($connexion)
		{
			$requete = $connexion->prepare('SELECT pseudo FROM `compte` join billet on billet.nom_redacteur = compte.id LIMIT 0, 3');
			$requete->execute();

			return $requete;
		}
	}
?>