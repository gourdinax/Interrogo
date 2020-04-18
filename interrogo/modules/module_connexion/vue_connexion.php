<?php
	include_once './vue_generique.php';

	class VueConnexion extends vueGenerique{

		function afficheBase($choix) {
			if($choix === 1) {
				echo 
					'			<div class="container bg-white pb-5" style="height: 700px">
				<div class="row pt-5 pb-2">
					<div class="col-md-10 m-1">
						<a href="./index.php?module=default" class="btn btn-light border mb-3">Accueil</a>
						<h3>Connexion</h3>
						<p class="text-muted">Connectez-vous vite afin de pouvoir accéder aux disciplines, passer ou même créer des QCM!</p>
					</div>
				</div> 
				';
			} else {
				echo 
					'<div class="container bg-white pb-5" style="height:800px; margin-top: -35px;">
				<div class="row pt-5 pb-2">
					<div class="col-md-6 m-3">
						<h3>Inscription</h3>
						<p class="text-muted">Inscrivez-vous afin de rejoindre la communauté grandissante d\'Interrogo !</p>
					</div>
				</div>
				';
			}
			
		}

		function formulaireConnexion($token) {
				echo '   	
				<div class="row justify-content-center mt-5">
					<div class="col-md-4 border rounded p-3">
						<form action="index.php?module=connexion&action=connexion" method="POST">
							<label for="log_user">Login</label>
							<input type="text" name="log_user" placeholder="Pseudo" class="form-control mb-4" />
							<label for="pwd_user">Mot de passe</label>
							<input type="password" name="pwd_user" placeholder="Mot de passe" class="form-control mb-4" />
							<button type="submit" class="btn btn-warning mb-2 d-block">Connexion</button>
							<input type="hidden" value='.$token.' name="token" />
							<p style="font-size: 12px">Pas encore inscrit ? <a href="index.php?module=connexion&action=forminscription">Inscrivez-vous dès maintenant !</a></p>
						</form>
					</div>
				</div>
			</div>
';
	  
		}

		function formulaireConnexionErr($choix, $token) {
			if( $choix === 1 ) {
				echo '   	
				<div class="row justify-content-center mt-5">
					<div class="col-md-4 border border-danger rounded p-3">
						<form action="index.php?module=connexion&action=connexion" method="POST">
							<label for="log_user">Login</label>
							<input type="text" name="log_user" placeholder="Pseudo" class="form-control mb-4" required />
							<label for="pwd_user">Mot de passe</label>
							<input type="password" name="pwd_user" placeholder="Mot de passe" class="form-control mb-4" required />
							<input type="hidden" value='.$token.' name="token" />
							<p style="color: red">Vous n\'avez pas rempli tous les champs</p>
							<button type="submit" class="btn btn-warning mb-2 d-block">Connexion</button>
							<p style="font-size: 12px">Pas encore inscrit ? <a href="index.php?module=connexion&action=forminscription">Inscrivez-vous dès maintenant !</a></p>
						</form>
					</div>
				</div>
			</div>
';
			} else { 
				echo '   	
				<div class="row justify-content-center mt-5">
					<div class="col-md-4 border border-danger rounded p-3">
						<form action="index.php?module=connexion&action=connexion" method="POST">
							<label for="log_user">Login</label>
							<input type="text" name="log_user" placeholder="Pseudo" class="form-control mb-4" required />
							<label for="pwd_user">Mot de passe</label>
							<input type="password" name="pwd_user" placeholder="Mot de passe" class="form-control mb-4" required />
							<input type="hidden" value='.$token.' name="token" />
							<p style="color: red">Votre login ou mot de passe est incorrect</p>
							<button type="submit" class="btn btn-warning mb-2 d-block">Connexion</button>
							<p style="font-size: 12px">Pas encore inscrit ? <a href="index.php?module=connexion&action=forminscription">Inscrivez-vous dès maintenant !</a></p>
						</form>
					</div>
				</div>
			</div>
';
			}

				
	  
		}

		function formulaireInscription($token) {
				echo '   	
				<div class="row justify-content-center mt - 0">
					<div class="col-md-4 border rounded p-3">
						<form action="index.php?module=connexion&action=inscription" method="POST">
							<p style="color: green; font-size: 14px; font-style: italic;"> <img src="images/warning.svg" alt="Attention:" style="width: 25px; height: 25px;"> Un mot de passe doit contenir : <br/> Entre 6 et 12 caractères, au moins : une majuscule, une minuscule, un chiffre et un caractère spécial.</p>
							<label for="log_user">Login</label>
							<input type="text" name="log_user" placeholder="Pseudo" class="form-control mb-4" required/>
							<label for="pwd_user">Mot de passe</label>
							<input type="password" name="pwd_user" placeholder="Mot de passe" class="form-control mb-4" required/>
							<label for="pwd_user">Confirmez le mot de passe</label>
							<input type="password" name="pwd_user_conf" placeholder="Confirmation mot de passe" class="form-control mb-4" required/>
							<input type="hidden" value='.$token.' name="token" />
							<button type="submit" class="btn btn-warning mb-2 d-block">S\'inscrire</button>
						</form>
					</div>
				</div>
			</div>
';
		}

		function formulaireInscriptionErr($token, $typeErr) {
				
				echo '   	
				<div class="row justify-content-center mt-5">
					<div class="col-md-4 border border-danger rounded p-3">
						<form action="index.php?module=connexion&action=inscription" method="POST">
							<p style="color: green; font-size: 14px; font-style: italic;"> <img src="images/warning.svg" alt="Attention:" style="width: 25px; height: 25px;"> Un mot de passe doit contenir : <br/> Entre 6 et 12 caractères, au moins : une majuscule, une minuscule, un chiffre et un caractère spécial.</p>
							<label for="log_user">Login</label>
							<input type="text" name="log_user" placeholder="Pseudo" class="form-control mb-4" required/>
							<label for="pwd_user">Mot de passe </label>
							<input type="password" name="pwd_user" placeholder="Mot de passe" class="form-control mb-4" required/>
							<label for="pwd_user">Confirmez le mot de passe</label>
							<input type="password" name="pwd_user_conf" placeholder="Confirmation mot de passe" class="form-control mb-4" required/>
							<input type="hidden" value='.$token.' name="token" />
							<p style="color: red">'. $typeErr . '</p>
							<button type="submit" class="btn btn-warning mb-2 d-block">S\'inscrire</button>
						</form>
					</div>
				</div>
			</div>
';
		}

		function bienvenueInscrit() {
				echo '
				<div class="row justify-content-center">
					<div class="col-md-6">
						<p>Merci pour votre inscription !</p>
					</div>
				</div>
			</div>';
		}

	}
?>