<?php
	defined( '_NOEXEC' ) or die( "C'est non." );
	include_once 'modules/module_gestion/cont_gestion.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModGestion{

		public $controleur;

		function __construct() {
		//	  ($_SESSION);
			$this->controleur = new ContGestion();
		}

	}

?>