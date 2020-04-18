<?php

	include_once 'modules/module_utilisateur/vue_utilisateur.php';
	include_once 'modules/module_utilisateur/modele_utilisateur.php';
    include_once 'lib/php/fonctions.php';

	class ContUtilisateur{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueUtilisateur();
			$this->modele= new ModeleUtilisateur();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			switch ($action) {

				case 'default' :
					if (isset($_SESSION['log_user'])) {
						$tabAll = $this->modele->getInfo($_SESSION['log_user']);
						$this->vue->afficheBase(2);
						createToken();
						$this->vue->afficheFormUtilisateur($tabAll, $_SESSION['token']);
					} else{
						$this->vue->afficheBase(1);
					}
					break;

				case 'affLog':
					$tabAll = $this->modele->getInfo($_SESSION['log_user']);
					$this->vue->afficheBase(2);
					createToken();
					$this->vue->afficheFormUtilisateur($tabAll, $_SESSION['token']);
					break;

				case 'changeLog':

					$newLog = $_POST['log_user'];
					$testLog = $this->modele->testNewLog($newLog);
					$testResult = $this->modele->testNewResult($_SESSION['log_user']);
					$testAuteur = $this->modele->testNewAuteur($_SESSION['log_user']);
					$testAuteurForum = $this->modele->testNewAuteurForum($_SESSION['log_user']);


						$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);

					if($testLog==false && $_POST['token']==$myToken && $myTimeToken+300>time()){

						$this->modele->updateLogUser($newLog, $_SESSION['log_user']);
						if($testResult!=false){
							$this->modele->updateLogResult($newLog, $_SESSION['log_user']);
						}
						if($testAuteur!=false){
							$this->modele->updateLogQcm($newLog, $_SESSION['log_user']);
						}
						if($testAuteurForum!=false){
							$this->modele->updateLogForum($newLog, $_SESSION['log_user']);
						}
						$_SESSION['log_user'] = $newLog;
						header('Location:index.php?module=utilisateur');
					}else{
						$tabAll = $this->modele->getInfo($_SESSION['log_user']);
						$this->vue->afficheBase(2);
						createToken();
						$this->vue->afficheFormUtilisateur($tabAll, $_SESSION['token']);
					}
					
					break;

				case 'changePwd':

					$myToken = $_SESSION['token'];
					$myTimeToken = $_SESSION['timeToken'];
					unset($_SESSION['token']);						
					unset($_SESSION['timeToken']);

					if($_POST['token']==$myToken && $myTimeToken+300>time() && $_POST['pwd_user'] == $_POST['pwd_user2'] ){

						$newPwd = $_POST['pwd_user'];
						$this->modele->updatePwdUser(password_hash($newPwd, PASSWORD_DEFAULT), $_SESSION['log_user']);
					}else{
						$tabAll = $this->modele->getInfo($_SESSION['log_user']);
						$this->vue->afficheBase(2);
						createToken();
						$this->vue->afficheFormUtilisateur($tabAll, $_SESSION['token']);

					}

					break;
				}


			}
		}          
?>