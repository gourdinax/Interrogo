<?php
	include_once 'API/qcm/cont_qcm.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModQcm{

		public $controleur;

		function __construct() {
			$this->controleur = new ContQcm();
		}

	}

?>