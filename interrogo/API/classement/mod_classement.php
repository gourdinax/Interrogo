<?php
	include_once 'API/classement/cont_classement.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModClassement{

		public $controleur;

		function __construct() {
			$this->controleur = new ContClassement();
		}

	}

?>