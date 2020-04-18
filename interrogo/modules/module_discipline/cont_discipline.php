<?php

	include_once 'modules/module_discipline/vue_discipline.php';
	include_once 'modules/module_discipline/modele_discipline.php';
    include_once 'lib/php/fonctions.php';

	class ContDiscipline{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueDiscipline();
			$this->modele = new ModeleDiscipline();

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			
			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
			
				case 'default' : 
					$this->vue->afficheBase(2);
					$this->vue->menu( $_SESSION['droit'] );
					break;
				
				case 'formAjoutDisc' :
					$this->vue->afficheBase(1); 
					createToken();
					$this->vue->formulaireAjoutDiscipline($_SESSION['token']);
					break;

				case 'ajoutDisc' : 
					$myToken = $_SESSION['token'];
					$myTimeToken = $_SESSION['timeToken'];
					unset($_SESSION['token']);
					unset($_SESSION['timeToken']);

					if( $_POST['token'] == $myToken && $myTimeToken + 300 > time() ) {
						$intitule = htmlspecialchars($_POST["intitule_disc"]);
						$description = htmlspecialchars($_POST["desc_disc"]);

						$this->modele->ajoutDiscipline($intitule, $description);
						
						header('Location: ./index.php?module=discipline');
					}

					break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	}
?>
