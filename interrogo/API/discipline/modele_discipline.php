<?php
	require_once './Connexion.php';

	class ModeleDiscipline extends Connexion {

		function getListeDisc($disc) {
			$valeur = array(); 
			( !empty($disc) ? array_push($valeur, htmlspecialchars( "%".trim($disc)."%" ) ) : null );

			$sql = "SELECT * FROM discipline";

			if( !empty( $valeur[0] ) ) {
				$sql .= " WHERE intitule_disc LIKE ?";
			}

			try {
				$bd = Connexion::$bdd; 
				$bd->exec("set names utf8");

				$req = $bd->prepare($sql);

				$req->execute( $valeur );
				$ret = $req->fetchAll(PDO::FETCH_ASSOC);

				$bd = null;
				return $ret;

			} catch(PDOException $exc) {
				return array("Erreur" => "Une erreur est survenue... Impossible de se connecter");
			}
		}

	}

?>