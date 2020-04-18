<?php


	require_once './Connexion.php';
	//chaque modèle extends connexion
	class ModeleForum extends Connexion {

		function getAllCom($id_qcm) {
			$bd = Connexion::$bdd;
			$bd->exec("set names utf8");
			$sql = "SELECT * from forum where id_qcm=?";
			$query = $bd->prepare($sql);
			$query->execute(array($id_qcm));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function getIntituleQcm($id_qcm) {
			$bd = Connexion::$bdd;
			$bd->exec("set names utf8");
			$sql = "SELECT intitule_qcm from qcm where id_qcm=?";
			$query = $bd->prepare($sql);
			$query->execute(array($id_qcm));

			return $query->fetch(PDO::FETCH_ASSOC);
		}

		function ajoutCom($id_qcm, $commentaire, $auteur){
			try {
				$bd = Connexion::$bdd;
				$sql = "INSERT INTO forum VALUES (?, DEFAULT, ?, ?)";
				$query = $bd->prepare($sql);
				$query->execute(array($id_qcm, $commentaire, $auteur));
			} catch(PDOExpcetion $exc) {
				return false;
			}
		}


	}
?>

