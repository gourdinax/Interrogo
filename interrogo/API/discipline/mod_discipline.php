<?php
	include_once 'API/discipline/cont_discipline.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModDiscipline{

		public $controleur;

		function __construct() {
			$this->controleur = new ContDiscipline();
		}

	}

?>