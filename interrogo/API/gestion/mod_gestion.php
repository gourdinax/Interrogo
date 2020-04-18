<?php
	include_once 'API/gestion/cont_gestion.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModGestion{

		public $controleur;

		function __construct() {
			$this->controleur = new ContGestion();
		}

	}

?>