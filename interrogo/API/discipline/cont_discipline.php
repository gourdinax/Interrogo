<?php

	include_once './API/discipline/modele_discipline.php';
	include_once './API/discipline/vue_discipline.php';

	header("Content-Type: application/json; charset=utf-8");

	class ContDiscipline{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new VueDiscipline();
			$this->modele= new ModeleDiscipline();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			$disc = ( isset( $_GET['disc'] ) ? $_GET['disc'] : null );

			switch ($action) {

				case 'liste':
					$this->liste($disc);
					break;

				case 'default':
					break;

			}
		}

		function liste($disc) {
			$tab = $this->modele->getListeDisc($disc);
			$this->vue->showResultat($tab);
		}

	} 

?>