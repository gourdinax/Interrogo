<?php

	include_once 'modules/module_qcm/vue_qcm.php';
	include_once 'modules/module_qcm/modele_qcm.php';
    include_once 'lib/php/fonctions.php';

	class ContQcm{

		public $vue;
		public $modele;
		public $controleurQues;

		function __construct() {

			$this->vue = new vueQcm();
			$this->modele= new ModeleQcm();

			$id_disc = $_GET['id'];

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
				
					case 'default' : 
						$this->vue->afficheBase(2, $id_disc);
						$this->vue->menu($id_disc);
						break;

					case 'formAjoutQcm' : 
						$this->vue->afficheBase(1, $id_disc);
						createToken();
						$this->vue->formulaireAjoutQcm($id_disc, $_SESSION['log_user'], $_SESSION['token']);
						break;


					case 'formAjoutQcmQR' : 
						$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);

						if($_POST['token']==$myToken && $myTimeToken+300>time()){

							$intitule_qcm = htmlspecialchars($_POST["intitule_qcm"]);
							$desc_qcm = htmlspecialchars($_POST["desc_qcm"]);
							$this->modele->ajoutQcm($intitule_qcm, $desc_qcm, $id_disc, $_SESSION['log_user']);

							$id_qcm = $this->modele->getLastIdQcm($id_disc);
							$id_qcm = $id_qcm['0'];
							$this->vue->afficheBase(1, $id_disc);
							createToken();
							$this->vue->formAjoutQcmQR($id_disc, $id_qcm['id_qcm'], 0, $_SESSION['token']);

						}else{

							$this->vue->afficheBase(1, $id_disc);
							createToken();
							$this->vue->formAjoutQcmQR($id_disc, $id_qcm['id_qcm'], 0, $_SESSION['token']);

						}

						break;
				
					case 'valider' :
						$this->vue->afficheBase(1, $id_disc);

						$idQ = $_GET['idQ'];
						$id_qcm = $_GET['id'];

						$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);

						if($idQ!=9 && $_POST['token']==$myToken && $myTimeToken+300>time()){
							 
							$intitule_ques = htmlspecialchars($_POST["intitule_ques"]);

							$tabR = array(htmlspecialchars($_POST["rep1"]),htmlspecialchars($_POST["rep2"]),htmlspecialchars($_POST["rep3"]),htmlspecialchars($_POST["rep4"]));

							$bonneRep = htmlspecialchars($_POST["choix"]);

							$id_ques = $this->modele->getLastIdQues();
							$id_ques = (int)$id_ques['id_ques'];

							$no_res = $this->modele->getLastIdRep();
							$no_res = (int)$no_res['no_res'];

							$this->modele->ajoutQuestion($id_ques+1, $intitule_ques, $bonneRep, $id_qcm);
							$no_res = $no_res+1;

							$this->modele->ajoutReponse($no_res, $tabR['0'], $idQ, $id_qcm);
							$no_res = $no_res+1;

							$this->modele->ajoutReponse($no_res, $tabR['1'], $idQ, $id_qcm);
							$no_res = $no_res+1;

							$this->modele->ajoutReponse($no_res, $tabR['2'], $idQ, $id_qcm);
							$no_res = $no_res+1;

							$this->modele->ajoutReponse($no_res, $tabR['3'], $idQ, $id_qcm);

							$idQ = $_GET['idQ']+1;

							createToken();
							$this->vue->formAjoutQcmQR($id_disc, $id_qcm, $idQ, $_SESSION['token']);
						}
						break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	}
?>
