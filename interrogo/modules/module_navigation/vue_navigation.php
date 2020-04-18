<?php

	include_once './vue_generique.php';

	class VueNavigation extends vueGenerique{

		function nav( $session ) {
			if( !empty($session["log_user"]) ){
				if( $session["droit"]=="1" ) {
					$d_admin=true;
					$d_inscrit=true;
				}else if($session["droit"]=="0"){
					$d_admin=false;
					$d_inscrit=true;
				}else{
					$d_admin=false;
					$d_inscrit=false;
				}
			}else{
				$d_admin=false;
				$d_inscrit=false;
			}

			echo '
				<div class="col-sm text-center"> 
					<a href="./index.php?module=default" class="text-decoration-none"><h4 class="text-white">Accueil</h4></a>
				</div>
				<div class="col-sm text-center">
					<a href="./index.php?module=discipline" class="text-decoration-none"><h4 class="text-white">Disciplines</h4></a>
				</div>
				'.( $d_inscrit==true ? '
				<div class="col-sm text-center">
					<a href="./index.php?module=classement" class="text-decoration-none"><h4 class="text-white">Classement</h4></a>
				</div>
				' : "" ).'

				'.( $d_admin==true ? '
				<div class="col-sm text-center">
					<a href="./index.php?module=gestion" class="text-decoration-none"><h4 class="text-white">Gestion</h4></a>
				</div>
				' : "").'

				'.( $d_inscrit==true ? '
				<div class="col-sm text-center">
					<a href="./index.php?module=utilisateur" class="text-decoration-none"><h4 class="text-white">'.$session['log_user'].'</h4></a>
					<ul class="list-unstyled">
						<li><a href="./index.php?module=connexion&action=deconnexion" class="text-white text-decoration-none">Déconnexion</a></li>
					</ul>
				</div>
				' : '
				<div class="col text-center">
					<a href="./index.php?module=utilisateur" class="text-decoration-none"><h4 class="text-white">Mon compte</h4></a>
					<ul class="list-unstyled">
						<li><a href="./index.php?module=connexion" class="text-white text-decoration-none">Me connecter</a></li>
					</ul>
				</div>
				').'
			';
		}

	}

?>