<?php

	function createToken(){
		$token=bin2hex(random_bytes(32));
		$_SESSION['token'] = $token;
		$_SESSION['timeToken'] = (time());
	}
	function verifConforme($mdp) {
		return strlen($mdp)  > 5 && strlen($mdp) < 13 && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $mdp);
	}

?>