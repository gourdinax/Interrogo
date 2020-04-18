<?php
	include_once './vue_generique.php';

	class VueUtilisateur extends vueGenerique {

		function afficheBase($choix) {
			if($choix === 1) {
				echo '
				<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
				<div class="col-12 m-3">
					<a href="./index.php?module=default" class="btn btn-light border mb-3">Accueil</a>
					<h3>Profil</h3>
					<p class="text-muted">Pour pouvoir accéder à votre profil vous devez d\'abord vous <a href="./index.php?module=connexion">connecter</a>.</p>
				</div>
			</div>
		</div>';
			} else {
				echo '
				<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
				<div class="col-12 m-3">
					<a href="./index.php?module=discipline" class="btn btn-warning border mb-3">Faire un QCM</a>
					<h3>Bienvenue '.$_SESSION['log_user'].' !</h3>
					<p class="text-muted">Parcourez votre profil pour jeter un coup d\'oeil aux QCM que vous avez réalisé, votre score et votre classement.</p>
				</div>
			</div>';
			}
		}
		
		function afficheFormUtilisateur($tabAll, $token) {
			echo '   
				<div class="row">
					<div class="col-md-6">
						<h5 class="mt-2">Paramètres</h5>
						<hr class="my-2">
						<!-- TODO : SCRIPT MODIF USER -->
						<form action="index.php?module=utilisateur&action=changeLog" method="POST" id="log_param" class="mb-3 ml-3 w-50">
							<label for="log_user">Changez votre login</label>
							<input type="text" name="log_user" placeholder="Login" class="form-control mb-3"/>
							<input type="hidden" value='.$token.' name="token" />
							<button type="submit" class="btn btn-secondary">Valider</button>
						</form>
						<form action="index.php?module=utilisateur&action=changePwd" method="POST" id="log_param" class="mb-3 ml-3 w-50">
							<label for="pwd_user" class="mt-2">Changez votre mot de passe</label>
							<input type="password" name="pwd_user" placeholder="Mot de passe" class="form-control mb-3" />
							<input type="password" name="pwd_user2" placeholder="Confirmer mot de passe" class="form-control mb-3" />
							<input type="hidden" value='.$token.' name="token" />
							<button type="submit" class="btn btn-secondary">Valider</button>
						</form>
					</div>
					<div class="col-md-6 border rounded text-center">
						<h5 class="m-2">Votre score</h5>
						<div id="score_user">';
				$scoreT = 0;
                foreach($tabAll as $ld) {
                    $scoreT = $scoreT + $ld['note'];      
                }
                			echo $scoreT;
                echo        '
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-6 offset-md-6 border rounded text-center">
						<h5 class="m-2">Vos derniers QCM réalisés</h5>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th scope="col">QCM</th>
									<th scope="col">Score</th>
								</tr>
							</thead>
								<tbody>';
		
				foreach($tabAll as $ld) {
							echo '
								<tr>
									<td scope="col">
										'.$ld['intitule_qcm'].'
									</td>
									<td scope="col">
										'.$ld['note'].'
									</td>
									<td scope="col">
										<a href="./index.php?module=forum&idQcm='.$ld['id_qcm'].'" class="btn btn-warning">Forum</a>
									</td>
								</tr>
							';
				}

				echo		'</tbody>
						</table>
					</div>
				</div>
			</div>
	';
		}
	}
		  
?>