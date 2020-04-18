<?php
	include_once './vue_generique.php';

	class VueGestion extends vueGenerique {

		function showResultat($tab) {
			echo json_encode($tab);
		}

	}

?>