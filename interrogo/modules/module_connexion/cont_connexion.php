<?php

	include_once 'modules/module_connexion/vue_connexion.php';
	include_once 'modules/module_connexion/modele_connexion.php';
    include_once 'lib/php/fonctions.php';

	class ContConnexion
	{

		public $vue;
		public $modele;

		function verifInscription() {
			return !empty($_POST['log_user']) && !empty($_POST['pwd_user']) && !empty($_POST['pwd_user_conf']) && 
						$_POST['pwd_user_conf']== $_POST['pwd_user'];
		}       
		function __construct() {
			
			$this->vue = new vueConnexion();
			$this->modele= new ModeleConnexion();

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			switch ($action) {
			
				case 'default' : 
					$this->vue->afficheBase(1);
					createToken();
					$this->vue->formulaireConnexion($_SESSION['token']);
					break;

				case 'forminscription' : 
					$this->vue->afficheBase(2);
					createToken();
					$this->vue->formulaireInscription($_SESSION['token']);
					break;

				case 'inscription' :

					if( !empty($_POST['log_user']) && !empty($_POST['pwd_user']) && !empty($_POST['pwd_user_conf']) && 
						$_POST['pwd_user_conf']== $_POST['pwd_user'] && verifConforme($_POST['pwd_user']) && $this->modele->loginDispo($_POST['log_user'])  ) { // Tous les champs remplis et confirmation mdp est juste
					 	$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);


						if($_POST['token']==$myToken && $myTimeToken+300>time()){

							$log_user = htmlspecialchars($_POST["log_user"]);
							$pwd_user = htmlspecialchars($_POST["pwd_user"]);
							$pwd_user = password_hash($pwd_user, PASSWORD_DEFAULT);

							$this->modele->ajoutUtilisateur($log_user, $pwd_user);
							createToken();
							$this->vue->afficheBase(1);
							$this->vue->formulaireConnexion($_SESSION['token']);

						}						
					}
					else {
						$this->vue->afficheBase(2);
						
						if (empty($_POST['log_user']) || empty($_POST['pwd_user'])  ) {
							$typeErr= 'Veuillez saisir tous les champs.';
						}
						else if (empty($_POST['pwd_user_conf'])) {
							$typeErr= 'Veuillez confirmer le mot de passe';
						}
						else if($_POST['pwd_user_conf'] != $_POST['pwd_user']) {
							$typeErr= 'Attention, les mots de passe ne sont pas identiques.';
						}
						else if (!verifConforme($_POST['pwd_user'])) {
							$typeErr= 'Le mot de passe n\'est pas conforme au format exigé';
						}
						else if ( !($this->modele->loginDispo($_POST['log_user']) ) ) {
							$typeErr= 'Login déjà pris';
						}	
						else {
							$typeErr= 'Veuillez saisir tous les champs.';
						}
						createToken();
						$this->vue->formulaireInscriptionErr($_SESSION['token'], $typeErr);
					}
					break;
	
				case 'connexion' : 
						$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);

					if( !empty($_POST['log_user']) && !empty($_POST['pwd_user']) && $_POST['token']==$myToken && $myTimeToken+300>time()) {
						$log_user = htmlspecialchars($_POST["log_user"]);
						$pwd_user = htmlspecialchars($_POST["pwd_user"]);

						if( $this->modele->connexionUtilisateur($log_user, $pwd_user) === false ) {
							$this->vue->afficheBase(1);
							createToken();
							$this->vue->formulaireConnexionErr(2, $_SESSION['token']);
						} else {
							$this->modele->getDroitUtilisateur($log_user);
							header('Location: ./index.php?module=utilisateur');
						}

					} else {
						$this->vue->afficheBase(1);
						createToken();
						$this->vue->formulaireConnexionErr(1, $_SESSION['token']);
					}
					break;

				case 'deconnexion' : 
					$this->modele->deconnexion();
					header('Location: ./index.php?module=utilisateur');
					break;
			
			}
		}   

		
	 
	}
?>