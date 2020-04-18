<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );
	include_once 'modules/module_forum/vue_forum.php';
	include_once 'modules/module_forum/modele_forum.php';
	include_once 'lib/php/fonctions.php';

	class ContForum{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueForum();
			$this->modele = new ModeleForum();

			$id_qcm = $_GET['idQcm'];
			$auteur = $_SESSION['log_user'];

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			
			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
				
					case 'default' :
						$tabAll = $this->modele->getAllCom($id_qcm);
						$intitule_qcm = $this->modele->getIntituleQcm($id_qcm);
						$intitule_qcm = implode("", $intitule_qcm);

						$this->vue->afficheBase(1, $intitule_qcm);
						$this->vue->affCom($tabAll); 
						$this->vue->menu($id_qcm);
						$this->vue->afficheBase(2, $intitule_qcm);
						break;

					case 'affFormCom':
						createToken();
						$tabAll = $this->modele->getAllCom($id_qcm);
						$intitule_qcm = $this->modele->getIntituleQcm($id_qcm);
						$intitule_qcm = implode("", $intitule_qcm);

						$this->vue->afficheBase(1, $intitule_qcm); 
						$this->vue->affCom($tabAll); 
						$this->vue->affFormCom($id_qcm, $_SESSION['token']);
						break;

					case 'ajoutCom' :
						$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);

						if( $_POST['token'] == $myToken && $myTimeToken + 300 > time() ){
							$commentaire = htmlspecialchars($_POST["commentaire"]);
							$this->modele->ajoutCom($id_qcm,$commentaire,$auteur);
						}

						$tabAll = $this->modele->getAllCom($id_qcm);
						$intitule_qcm = $this->modele->getIntituleQcm($id_qcm);
						$intitule_qcm = implode("", $intitule_qcm);

						header('Location:index.php?module=forum&idQcm='.$id_qcm.'');	
						break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	 
	}
?>
