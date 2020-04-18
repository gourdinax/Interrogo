
<?php

	include_once 'modules/module_navigation/cont_navigation.php';
	include_once './Connexion.php';

	 Connexion::initConnexion();

	class ModNavigation{

		public $controleur;

		 function __construct() {
			
		   $this->controleur=new ContNavigation();

		}

	}

?>

