<?php
	include_once 'modules/module_default/vue_default.php';
	include_once 'modules/module_default/modele_default.php';

	class ContDefault{

		public $vue;
		public $modele;

		function __construct() {
			$this->vue = new VueDefault();
			$this->modele = new ModeleDefault();

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			
			switch ($action) {

				case 'default':
					$this->vue->affichageIndex();
					break;
			}
		}
	}
?>