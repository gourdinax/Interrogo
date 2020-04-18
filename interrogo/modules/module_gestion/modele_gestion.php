<?php
	require_once './Connexion.php';

	//chaque modèle extends connexion
	class ModeleGestion extends Connexion {

		function getAllQCMValideOuNon($validation){
			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT * FROM qcm where validation=?');
			$data = array($validation);
			$query->execute($data);
			$result = $query->fetchAll(PDO::FETCH_ASSOC); 
			return $result;
		}

		function getAllQCM(){
			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT * FROM qcm');
			$data = array();
			$query->execute($data);
			$result = $query->fetchAll(PDO::FETCH_ASSOC); 
			return $result;
		}

		function updateValidation($validation, $id_qcm) {
			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE qcm SET qcm.validation = ? WHERE qcm.id_qcm=?');
			$query->execute(array($validation, $id_qcm));
		}
		
	}

?>