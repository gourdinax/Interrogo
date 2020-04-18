<?php
	
	$_SESSION != null or die ('Il faut se connecter.');
	$_SESSION['droit']==1 or die( "Pour vous c'est non." );
	include_once 'modules/module_gestion/vue_gestion.php';
	include_once 'modules/module_gestion/modele_gestion.php';
    include_once 'lib/php/fonctions.php';

	class ContGestion{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueGestion();
			$this->modele= new ModeleGestion();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {

					case 'default':
						$this->vue->afficheBase();
						break;

					case 'valider' :
						$this->modele->updateValidation(1, $_GET['idQcm']);
						header('Location: ./index.php?module=gestion');
						break;

					case 'plusvalider' :
						$this->modele->updateValidation(0, $_GET['idQcm']);
						header('Location: ./index.php?module=gestion');
						break;


				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}  
	}	
        
?>
