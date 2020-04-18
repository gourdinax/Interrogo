<?php

	include_once 'modules/module_navigation/vue_navigation.php';
	include_once 'modules/module_navigation/modele_navigation.php';

	class ContNavigation{

		public $vue;

		function __construct() {
			$this->vue = new vueNavigation();
			$this->vue->nav( $_SESSION );
		}          
	}
?>
