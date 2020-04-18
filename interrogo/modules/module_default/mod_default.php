<?php

	include_once 'modules/module_default/cont_default.php';
	include_once './Connexion.php';

	 Connexion::initConnexion();

	class ModDefault{

		public $controleur;

		function __construct() {

			$this->controleur = new ContDefault();

		}

	}

?>