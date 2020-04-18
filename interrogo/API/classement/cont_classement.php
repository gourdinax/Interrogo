<?php

	include_once './API/classement/modele_classement.php';
	include_once './API/classement/vue_classement.php';

	header("Content-Type: application/json; charset=utf-8");

	class ContClassement{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new VueClassement();
			$this->modele= new ModeleClassement();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			$disc = ( isset( $_GET['disc'] ) ? $_GET['disc'] : null );
			$user = ( isset( $_GET['user'] ) ? $_GET['user'] : null );

			switch ($action) {

				case 'liste':
					$this->listeDisc();
					break;

				case 'default':
					$this->listeUser($disc, $user);
					break;

			}
		}

		function listeDisc() {
			$tab = $this->modele->getListeDisciplines();
			$this->vue->showResultat($tab);
		}

		function listeUser($disc, $user) {
			$tab = $this->modele->getGlobalScoreUserDisc($disc, $user);
			$this->vue->showResultat($tab);
		}

	} 

?>