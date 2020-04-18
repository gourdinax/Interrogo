<?php
	require_once './Connexion.php';

	class ModeleClassement extends Connexion {

		function getListeDisciplines() {

			try {
				$bd = Connexion::$bdd; 
				$bd->exec("set names utf8");

				$sql = "SELECT * FROM discipline ORDER BY intitule_disc ASC";
				$req = $bd->prepare($sql);

				$req->execute();
				$ret = $req->fetchAll(PDO::FETCH_ASSOC);

				return $ret;
				$bd = null;

			} catch(PDOException $exc) {
				return json_encode( array("Erreur" => "Une erreur est survenue... Impossible de se connecter") );
			}

		}

		function getGlobalScoreUserDisc( $disc, $user ) {
			$tab = $this->buildArray( $disc, $user );
			$sql = $this->buildReq( $disc, $user );

			try {
				$bd = Connexion::$bdd; 
				$bd->exec("set names utf8");

				$req = $bd->prepare( $sql );

				$req->execute( $tab );

				$ret = $req->fetchAll(PDO::FETCH_ASSOC);

				$bd = null;
				return $ret;

			} catch(PDOException $exc) {
				return array("Erreur" => "Une erreur est survenue... Impossible de se connecter");
			}
		}

		function buildArray( $disc, $user ) {
			$valeurs = array();
			( !empty($user) ? array_push( $valeurs, htmlspecialchars( "%".trim($user)."%") ) : null );
			( !empty($disc) ? array_push( $valeurs, $disc ) : null );

			return $valeurs;
		}

		function buildReq( $disc, $user ) {
			$valeurs2 = array();
			( !empty($user) ? array_push( $valeurs2,array("user" => "%".trim($user)."%") ) : null );
			( !empty($disc) ? array_push( $valeurs2, array("disc" => $disc) ) : null );

			$sql = "SELECT log_user AS utilisateur, SUM(note) AS note FROM resultat NATURAL JOIN qcm";
			$sql2 = "";

			if( !empty($valeurs2) ) {
				$sql2 .= " WHERE";

				foreach ($valeurs2 as $val) {
					if( !empty($val['user']) ) {
						$sql2 .= " log_user LIKE ? AND";
					}
					if( !empty($val['disc']) ) {
						$sql2 .= " id_disc = ? AND";
					}
				}

			}

			$sql .= substr($sql2, 0, -4)." GROUP BY log_user ORDER BY note DESC";
	
			return $sql;
		}

	}

?>