<?php
	include_once './vue_generique.php';

	class VueClassement extends vueGenerique {

		function showResultat($tab) {
			echo json_encode($tab);
		}

	}

?>