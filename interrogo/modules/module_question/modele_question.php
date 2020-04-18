<?php


	require_once './Connexion.php';


	//chaque modèle extends connexion
	class ModeleQuestion extends Connexion {

		function getQuestion($id_qcm) {

			$bd = Connexion::$bdd;
			$bd->exec('set names utf8');
			$query = $bd->prepare('SELECT intitule_ques from question where id_qcm=?');
			$query->execute(array($id_qcm));
			return $query->fetchALl(PDO::FETCH_ASSOC);
		}

		function getReponse($id_question, $id_qcm) {

			$bd = Connexion::$bdd;
			$bd->exec('set names utf8');
			$query = $bd->prepare('SELECT intitule_res from reponse where id_ques=? && id_qcm=?');
			$query->execute(array($id_question, $id_qcm));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function getBonneRep($id_question, $id_qcm) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT reponse from question where id_ques=? && id_qcm=?');
			$query->execute(array($id_question, $id_qcm));
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		function getIdQues($intitule_ques, $id_qcm) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT id_ques from question where intitule_ques=? && id_qcm=?');
			$query->execute(array($intitule_ques, $id_qcm));
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		function getIdDisc($id_qcm) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT id_disc from qcm where id_qcm=?');
			$query->execute(array($id_qcm));
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		function ajoutScore($id_qcm, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE resultat set new_note = new_note + 1 where id_qcm=? && log_user=?');
			$query->execute(array($id_qcm, $log_user));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function getScore($id_qcm, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT new_note from resultat where id_qcm=? && log_user=?');
			$query->execute(array($id_qcm, $log_user));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function getScoreAncien($id_qcm, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT note from resultat where id_qcm=? && log_user=?');
			$query->execute(array($id_qcm, $log_user));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function updateScore($score, $id_qcm, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE resultat SET note=? where id_qcm=? && log_user=?');
			$query->execute(array($score, $id_qcm, $log_user));
		}

		function updateScoreAncien($score, $id_qcm, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE resultat SET new_note=? where id_qcm=? && log_user=?');
			$query->execute(array($score, $id_qcm, $log_user));
		}

		function ajoutUtiliScore($id_qcm, $log_user){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('INSERT INTO resultat VALUES (?, ?, DEFAULT, DEFAULT)');
			$query->execute(array($id_qcm, $log_user));

		}



	   
	}

?>

