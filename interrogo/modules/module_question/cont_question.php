<?php

	include_once 'modules/module_question/vue_question.php';
	include_once 'modules/module_question/modele_question.php';


	class ContQuestion{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueQuestion();
			$this->modele= new ModeleQuestion();

			$id_qcm =  $_GET['id'];
			$id_question = $_GET['idQuestion'];

			$tabQ = $this->modele->getQuestion($id_qcm);
			$tabR = $this->modele->getReponse($id_question, $id_qcm);

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {

					case 'default' :
						$test = $this->modele->getScore($id_qcm, $_SESSION['log_user']);

						if(sizeof($test)==0){
							$this->modele->ajoutUtiliScore($id_qcm, $_SESSION['log_user']);
						}
						$this->modele->updateScoreAncien(0, $id_qcm, $_SESSION['log_user']);
						$this->vue->afficheBase();
						$this->vue->affQuestion($tabQ, $id_question);
						$this->vue->affReponse($tabR, $id_question, $id_qcm);
						$this->vue->affMenu($id_question, $id_qcm);
						break;

					case 'valider' :

						$this->vue->afficheBase();
						$blabla_ques= $tabQ[$id_question];
						$blabla_ques = implode("", $blabla_ques);
						$id_ques = $this->modele->getIdQues($blabla_ques, $id_qcm);
						$id_ques = implode("", $id_ques);
						$bonneRep = $this->modele->getBonneRep($id_ques, $id_qcm);
						$bonneRep = $bonneRep['reponse'];

						if (isset($_POST['choix'])) {
							$rep = htmlspecialchars($_POST['choix']);
						} else {
							$rep = 'null';
						}
						if($rep == $bonneRep){
							$this->modele->ajoutScore($id_qcm, $_SESSION['log_user']);
							$score = $this->modele->getScore($id_qcm, $_SESSION['log_user']);
							$score = implode(',',$score['0']);
							$this->vue->bonneRepAff($score);
						}else{
							$score = $this->modele->getScore($id_qcm, $_SESSION['log_user']);
							$score = implode(',',$score['0']);
							$this->vue->mauvaiseRepAff($score);
						}
						$this->vue->affMenu($id_question, $id_qcm);
						break;

					case 'suivant' :

						$this->vue->afficheBase(0);

						$idQ = $id_question + 1;

						if($id_question!=count($tabQ)-1){

							$tabR = $this->modele->getReponse($idQ, $id_qcm);

							$this->vue->affQuestion($tabQ, $idQ);
							$this->vue->affReponse($tabR, $idQ, $id_qcm);
							$this->vue->affMenu($idQ, $id_qcm);

						}else{	
							$score = $this->modele->getScore($id_qcm, $_SESSION['log_user']);
							$scoreAncien = $this->modele->getScoreAncien($id_qcm, $_SESSION['log_user']);
							$score = implode('', $score['0']);
							$scoreAncien = implode('', $scoreAncien['0']);

							if((int)$score['0']>(int)$scoreAncien['0']){
								$this->modele->updateScore($score, $id_qcm, $_SESSION['log_user']);
								$this->vue->affFinScore1($score, $scoreAncien);

							} else if ((int)$scoreAncien['0']==0 || (int)$score['0']==(int)$scoreAncien['0']){

								$this->vue->affFinScore2($score);
							} else{
								$this->vue->affFinScore3($score, $scoreAncien);
							}

							$id_disc = $this->modele->getIdDisc($id_qcm);
							$id_disc = implode("", $id_disc);
							$this->vue->affFinGlobal($id_qcm, $id_disc);
						}
						break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}
	}
?>
