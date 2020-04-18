<?php
	require_once './Connexion.php';

	class ModeleQcm extends Connexion {

		function getGlobalListQCMUser( $disc, $qcm, $user ) {
			$tab = $this->buildArray( $disc, $qcm, $user );
			$sql = $this->buildReq( $tab );

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

		function buildArray( $disc, $qcm, $user ) {
			$valeurs = array();
			( !empty($disc) ? array_push( $valeurs, $disc ) : null );
			( !empty($user) ? array_push( $valeurs, htmlspecialchars( "%".trim($user)."%") ) : null );
			( !empty($qcm) ? array_push( $valeurs, htmlspecialchars( "%".trim($qcm)."%") ) : null );

			return $valeurs;
		}

		function buildReq( $tab ) {
			$sql = "SELECT * FROM qcm WHERE id_disc = ? AND validation = 1";

			if( !empty( $tab[1] ) ) {
				$sql .= " AND auteur LIKE ?";
			}

			if( !empty( $tab[2] ) ) {
				$sql .= " AND intitule_qcm LIKE ?";
			}
			
			$sql .= " ORDER BY intitule_qcm ASC";

			return $sql;
		}

	}

?>