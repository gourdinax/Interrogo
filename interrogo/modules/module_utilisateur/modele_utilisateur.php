<?php
	require_once './Connexion.php';

	//chaque modèle extends connexion
	class ModeleUtilisateur extends Connexion {

		function getListeUtilisateur(){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT log_user from utilisateur');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		function getInfo($log_user){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT resultat.id_qcm, note, intitule_qcm, desc_qcm FROM resultat inner join qcm on resultat.id_qcm = qcm.id_qcm where log_user=?');
			$data = array($log_user);
			$query->execute($data);
			$result = $query->fetchAll(PDO::FETCH_ASSOC); 
			return $result;

		}


		function testNewLog($newLog){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT log_user from utilisateur where log_user=?');
			$data = array($newLog);
			$query->execute($data);
			return $query->fetch(PDO::FETCH_ASSOC);

		}

		 function testNewResult($log_user){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT log_user from resultat where log_user=?');
			$data = array($log_user);
			$query->execute($data);
			return $query->fetch(PDO::FETCH_ASSOC);

		}

		 function testNewAuteur($log_user){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT auteur from qcm where auteur=?');
			$data = array($log_user);
			$query->execute($data);
			return $query->fetch(PDO::FETCH_ASSOC);

		}

		 function testNewAuteurForum($log_user){

			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT auteur from forum where auteur=?');
			$data = array($log_user);
			$query->execute($data);
			return $query->fetch(PDO::FETCH_ASSOC);

		}

		function updateLogUser($newLog, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE utilisateur SET utilisateur.log_user = ? WHERE utilisateur.log_user=?');
			$query->execute(array($newLog, $log_user));

		}

		function updatePwdUser($newLog, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE utilisateur SET utilisateur.pwd_user = ? WHERE utilisateur.log_user=?');
			$query->execute(array($newLog, $log_user));

		}

		 function updateLogResult($newLog, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE resultat SET  resultat.log_user = ?  WHERE  resultat.log_user = ? ');
			$query->execute(array($newLog, $log_user));

		}

		 function updateLogQcm($newLog, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE qcm SET qcm.auteur = ?  WHERE qcm.auteur=?');
			$query->execute(array($newLog, $log_user));

		}

		function updateLogForum($newLog, $log_user) {

			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE forum SET forum.auteur = ?  WHERE forum.auteur=?');
			$query->execute(array($newLog, $log_user));

		}
	   
	}

?>