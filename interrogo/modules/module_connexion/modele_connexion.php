<?php
	require_once './Connexion.php';

	//chaque modèle extends connexion
	class ModeleConnexion extends Connexion {

		function getDroitUtilisateur($log_user) {
			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT droit from utilisateur WHERE log_user = ?');
			$query->execute( array($log_user) );
			$droit = $query->fetch(PDO::FETCH_ASSOC);
			$_SESSION['droit'] = $droit['droit'];
 		}

		function ajoutUtilisateur($log_user, $pwd_user){
			$bd = Connexion::$bdd;
			$sql = "INSERT INTO utilisateur VALUES (?, ?, DEFAULT)";
			$query = $bd->prepare($sql);
			$query->execute(array($log_user, $pwd_user));
		}

		function connexionUtilisateur($log_user, $pwd_user){
			//refaire log unique 
			$bd = Connexion::$bdd;
			$sql = "SELECT pwd_user FROM utilisateur WHERE log_user = ?";
			$query = $bd->prepare($sql);
			$data = array($log_user);
			$query->execute($data);
			$result = $query->fetch(); 

			if(password_verify($pwd_user, $result['pwd_user'])){
				$_SESSION['log_user'] = $log_user;
				return true;
			} else {
				return false;
			}
		}

		function loginDispo( $login ) {
			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT * from utilisateur WHERE log_user = ?');
			$query->execute( array($login) );
			$droit = $query->fetch(PDO::FETCH_ASSOC);	
			$a= empty($droit);
			
			return $a;
		}
		function deconnexion(){
			session_unset();
		}
	
	}
	
?>