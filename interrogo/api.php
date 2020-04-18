<?php
	session_start();

	include_once './Connexion.php';

	Connexion::initConnexion();

	if (isset($_GET['module'])) {
		$module = $_GET['module'];
	}
	
	switch ($module) {

		case "qcm":
			include_once 'API/qcm/mod_qcm.php';
			$moduleObj = new ModQcm();
			break;

		case "discipline":
			include_once 'API/discipline/mod_discipline.php';
			$moduleObj = new ModDiscipline();
			break;

		case "classement":
			include_once 'API/classement/mod_classement.php';
			$moduleObj = new ModClassement();
			break;

		case "gestion":
			include_once 'API/gestion/mod_gestion.php';
			$moduleObj = new ModGestion();
			break;
	}

?>