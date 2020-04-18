<?php

	include_once './API/gestion/modele_gestion.php';
	include_once './API/gestion/vue_gestion.php';

	header("Content-Type: application/json; charset=utf-8");

	class ContGestion{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new VueGestion();
			$this->modele= new ModeleGestion();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			$qcm = ( isset( $_GET['qcm'] ) ? $_GET['qcm'] : null );
			$user = ( isset( $_GET['user'] ) ? $_GET['user'] : null );
			$etat = ( isset( $_GET['etat'] ) ? $_GET['etat'] : null );

			switch ($action) {

				case 'liste':
					$this->liste($qcm, $user, $etat);
					break;

				case 'default':
					break;

			}
		}

		function liste($qcm, $user, $etat) {
			$tab = $this->modele->getGlobalListQCMUser($qcm, $user, $etat);
			$this->vue->showResultat($tab);
		}

	} 

?>