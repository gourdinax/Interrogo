<?php

	include_once 'modules/module_utilisateur/cont_utilisateur.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModUtilisateur{

		public $controleur;

		function __construct() {
			$this->controleur = new ContUtilisateur();
		}

	}

?>