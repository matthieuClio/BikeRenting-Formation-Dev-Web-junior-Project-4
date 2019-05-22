<?php

	if(!empty($_POST['submit_connexion']) ) {
		require('../src/view/back/backoffice_view.php');
	}
	else if(empty($_POST['submit_connexion']) ) {
		require('../src/view/back/backoffice_connexion_view.php');
	}
?>