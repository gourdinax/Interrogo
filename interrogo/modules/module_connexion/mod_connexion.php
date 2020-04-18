
<?php

	include_once 'modules/module_connexion/cont_connexion.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModConnexion{

		public $controleur;

		function __construct() {
			
		 	$this->controleur=new ContConnexion();

		}

	}

?>
