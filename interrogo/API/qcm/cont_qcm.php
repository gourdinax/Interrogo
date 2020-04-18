<?php

	include_once './API/qcm/modele_qcm.php';
	include_once './API/qcm/vue_qcm.php';

	header("Content-Type: application/json; charset=utf-8");

	class ContQcm{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new VueQcm();
			$this->modele= new ModeleQcm();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			$disc = ( isset( $_GET['disc'] ) ? $_GET['disc'] : null );
			$qcm = ( isset( $_GET['qcm'] ) ? $_GET['qcm'] : null );
			$user = ( isset( $_GET['user'] ) ? $_GET['user'] : null );

			switch ($action) {

				case 'liste':
					$this->liste($disc, $qcm, $user);
					break;

				case 'default':
					break;

			}
		}

		function liste($disc, $qcm, $user) {
			$tab = $this->modele->getGlobalListQCMUser($disc, $qcm, $user);
			$this->vue->showResultat($tab);
		}

	} 

?>