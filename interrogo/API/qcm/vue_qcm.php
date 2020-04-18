<?php
	include_once './vue_generique.php';

	class VueQcm extends vueGenerique {

		function showResultat($tab) {
			echo json_encode($tab);
		}

	}

?>