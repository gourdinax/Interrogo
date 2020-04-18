<?php

	function nav() {
		if( !isset($_SESSION) ) {
			echo '
				<div class="col-sm-4 text-center"> 
					<a href="./index.php?module=default" class="text-decoration-none"><h4 class="text-white">Accueil</h4></a>
				</div>
				<div class="col-sm-4 text-center">
					<a href="./index.php?module=discipline" class="text-decoration-none"><h4 class="text-white">Disciplines</h4></a>
				</div>
				<div class="col-sm-4 text-center">
					<a href="./index.php?module=utilisateur" class="text-decoration-none"><h4 class="text-white">Mon compte</h4></a>
					<ul class="list-unstyled">
						<li><a href="./index.php?module=connexion" class="text-white text-decoration-none">Connexion</a></li>
					</ul>
				</div>';
		} else if( $_SESSION['droit'] === 0 ) {
			echo '
				<div class="col-sm-3 text-center">
					<a href="./index.php?module=default" class="text-decoration-none"><h4 class="text-white">Accueil</h4></a>
				</div>
				<div class="col-sm-3 text-center">
					<a href="./index.php?module=discipline" class="text-decoration-none"><h4 class="text-white">Disciplines</h4></a>
				</div>
				<div class="col-sm-3 text-center">
					<a href="./index.php?module=classement" class="text-decoration-none"><h4 class="text-white">Classement</h4></a>
				</div>
				<div class="col-sm-3 text-center">
					<a href="./index.php?module=utilisateur" class="text-decoration-none"><h4 class="text-white">'.$_SESSION['log_user'].'</h4></a>
					<ul class="list-unstyled">
						<li><a href="./index.php?module=connexion&action=deconnexion" class="text-white text-decoration-none">Déconnexion</a></li>
					</ul>
				</div>';
		} else {
			echo '
				<div class="col-sm text-center">
					<a href="./index.php?module=default" class="text-decoration-none"><h4 class="text-white">Accueil</h4></a>
				</div>
				<div class="col-sm text-center">
					<a href="./index.php?module=discipline" class="text-decoration-none"><h4 class="text-white">Disciplines</h4></a>
				</div>
				<div class="col-sm text-center">
					<a href="./index.php?module=classement" class="text-decoration-none"><h4 class="text-white">Classement</h4></a>
				</div>
				<div class="col-sm text-center">
					<a href="./index.php?module=gestion" class="text-decoration-none"><h4 class="text-white">Gestion</h4></a>
				</div>
				<div class="col-sm text-center">
					<a href="./index.php?module=utilisateur" class="text-decoration-none"><h4 class="text-white">'.$_SESSION['log_user'].'</h4></a>
					<ul class="list-unstyled">
						<li><a href="./index.php?module=connexion&action=deconnexion" class="text-white text-decoration-none">Déconnexion</a></li>
					</ul>
				</div>';
		}
	}
	
?>