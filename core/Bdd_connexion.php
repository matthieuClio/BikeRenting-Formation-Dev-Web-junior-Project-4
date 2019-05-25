<?php
	class Bdd_connexion
	{

		/* Set the connection parameters */

		private $host = 'localhost';
		private $dbname = 'projet4';
		private $login = 'root';
		private $password = '';


		public function Start()
		{
			$host = $this->host;
			$dbname = $this->dbname;
			$login = $this->login;
			$password = $this->password;

			try
			{
				$base = new PDO('mysql:host='.$host.';dbname='.$dbname,'root',$password);
			}
			catch (Exception $e)
			{
				die('erreur: ' .$e->getMessage());
			}

			return $base;

		}// End function Start


	} // End class BDD
?>