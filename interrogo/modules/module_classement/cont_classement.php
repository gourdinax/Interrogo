<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );

	include_once 'modules/module_classement/vue_classement.php';
	include_once 'modules/module_classement/modele_classement.php';

	class ContClassement{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueClassement();
			$this->modele = new ModeleClassement();

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			
			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
			
					case 'default' : 
						$this->vue->afficheBase();
						break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	}
?>
