<?php

	require_once './Connexion.php';

	//chaque modèle extends connexion
	class ModeleQcm extends Connexion {

		function ajoutQcm($intitule_qcm, $desc_qcm, $id_disc, $auteur){
			$bd = Connexion::$bdd;
			$bd->exec("set names utf8");
			$sql = "INSERT INTO qcm VALUES (DEFAULT, ?, ?, DEFAULT, ?, ?)";
			$query = $bd->prepare($sql);
			$query->execute(array($intitule_qcm, $desc_qcm, $id_disc, $auteur));
		}

		function getLastIdQcm($id_disc) {
			$bd = Connexion::$bdd;
			$bd->exec("set names utf8");
			$sql = "SELECT id_qcm from qcm where id_disc=? ORDER BY id_qcm desc";
			$query = $bd->prepare($sql);
			$query->execute(array($id_disc));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function ajoutQuestion($id_ques, $intitule_ques, $bonneRep, $id_qcm){
			$bd = Connexion::$bdd;
			$sql = "INSERT INTO question VALUES (?, ?, ?, ?)";
			$query = $bd->prepare($sql);
			$query->execute(array($id_ques, $intitule_ques, $bonneRep, $id_qcm));
		}


			function ajoutReponse($no_res, $intitule_res, $idQ, $id_qcm){
			$bd = Connexion::$bdd;
			$sql = "INSERT INTO reponse VALUES (?, ?, ?, ?)";
			$query = $bd->prepare($sql);
			$query->execute(array($no_res, $intitule_res, $idQ, $id_qcm));

		}

		function getLastIdQues() {
			$bd = Connexion::$bdd;
			$sql = "SELECT id_ques from question ORDER BY id_ques desc";
			$query = $bd->prepare($sql);
			$query->execute(array());
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		function getLastIdRep() {
			$bd = Connexion::$bdd;
			$sql = "SELECT no_res from reponse ORDER BY no_res desc";
			$query = $bd->prepare($sql);
			$query->execute(array());
			return $query->fetch(PDO::FETCH_ASSOC);
		}

	}

?>

