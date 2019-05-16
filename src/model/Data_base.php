<?php 
	class Data_Base {

		public function UltimeSelect($colonne, $table, $condition, $donne_post, $limit, $connexion) {
			
		// initializes
			$compteur= 0;
			$nb_element= count($colonne);
			$colonne_final= '';
			$condition_final= '';
			$condition_where= ' WHERE ';

		// Sets whether to set a display limit or not (LIMIT ou pas)
			if($limit != "") {
				$reqLimit= ' LIMIT '.$limit;
			}
			else {
				$reqLimit= "";
			}
		//	Defines the name of the columns of the query
			while($compteur <= $nb_element -1 ) {

				if($compteur == $nb_element -1) {
					$colonne_final= $colonne_final.$colonne[$compteur];
					$compteur++;
				}
				else {
					$colonne_final= $colonne_final.$colonne[$compteur].', ';
					$compteur++;
				}
			}

		// reset
			$compteur= 0;
			$nb_element= count($condition);
			$complementReqAnd= " AND ";
			$ajout= 0;	// Variable qui indiquera l'ajout d'un champ
			$complementReq= $condition;
			$complementExe= array();
			$complementReqPost= $donne_post;

		// Defines the conditions of the request
			if($nb_element >= 1 && count($donne_post) >= 1 ) {
				while($compteur != $nb_element) {
					// Stock $_POST dans une variable
					$input= $donne_post[$compteur];

					if(!empty($input)){
						if($ajout >= 1){
							$condition_where= $condition_where.$complementReqAnd.$complementReq[$compteur];
							$complementExe[$ajout]= $complementReqPost[$compteur];
						}
						else if($ajout == 0){
							$condition_where= $condition_where.$complementReq[$compteur];
							$complementExe[$ajout]= $complementReqPost[$compteur];
						}
						$ajout++;
					}
					$compteur++;
				}
				$condition_final= $condition_where;
			}

		//	Final request
			//echo 'Champ: '.$colonne_final.' /Table:'.$table.$condition_final.' '.$reqLimit;
			$requete= $connexion->prepare('SELECT '.$colonne_final.' FROM '.$table.$condition_final.$reqLimit);
			$donne= array($requete, $complementExe);
			return $donne;

		}//	End function


		public function UltimeInsert($colonne, $table, $condition, $donne_post, $connexion) {
			
			// Initializes
				$compteur= 0;
				$nb_element= count($condition);
				$complementReqAnd= " , ";
				$ajout= 0;	// Variable that will indicate the addition of a field
				$complementReq= $condition;
				$complementExe= array();
				$complementReqPost= $donne_post;
				$condition_where= ' VALUES( ';
				$condition_final= '';
				$nb_element_colonne= count($colonne);
				$colonne_final= '';

			// Defines the conditions of the request
				if($nb_element >= 1 && count($donne_post) >= 1 ) {
					while($compteur != $nb_element) {

					// Stock $ _POST in a variable
						$input= $donne_post[$compteur];

						if(!empty($input)) {
							if($ajout >= 1){
								$condition_where= $condition_where.$complementReqAnd.$complementReq[$compteur];
								$complementExe[$ajout]= $complementReqPost[$compteur];
							}
							else if($ajout == 0) {
								$condition_where= $condition_where.$complementReq[$compteur];
								$complementExe[$ajout]= $complementReqPost[$compteur];
							}
							$ajout++;
						}
						else {
							$colonne[$compteur]= '';
						}
						$compteur++;
					}
					$condition_final= $condition_where.')';
				}

			// réinitialisation
				$compteur= 0;
				$ajout= 0;
			// définit le nom des colonnes de la requete
				while($compteur <= $nb_element_colonne -1 ) {
					if($colonne[$compteur] != '' && $ajout == 0) {
						$colonne_final= $colonne_final.$colonne[$compteur];
						$compteur++;
						$ajout++;
					}
					else if($colonne[$compteur] != '' && $ajout > 0) {
						$colonne_final= $colonne_final.', '.$colonne[$compteur];
						$compteur++;
					}
					else {
						$compteur++;
					}				
				}
			//	requete final
				$requete= $connexion->prepare('INSERT INTO '.$table.'('.$colonne_final.')'.$condition_final);
				$donne= array($requete, $complementExe);

				return $donne;
		}//	fin function

	}// End class Data_Base

	