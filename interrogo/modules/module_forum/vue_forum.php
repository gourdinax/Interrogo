<?php

	include_once './vue_generique.php';

	class VueForum extends vueGenerique{


			function affCom($tabAll){

				foreach($tabAll as $ld) {
					echo '
						<div class="row justify-content-center mx-2 my-3">
							<div class="col-md-6 border border-secondary rounded p-2">
								<p>'.$ld['commentaire'].'</p>
								<footer class="blockquote-footer text-right mr-3">'.$ld['auteur'].'</footer>
							</div>
						</div>
					';

				}

			}

			function menu($id_qcm){

				echo '
					<div class="row justify-content-center mx-2 my-3">
						<div class="col-md-6 text-right p-0">
							<a href="index.php?module=forum&action=affFormCom&idQcm='.$id_qcm.'" class="btn btn-warning">Ajouter un commentaire</a>
						</div>
					</div>';

			}

			function affFormCom($id_qcm, $token){
				echo '   	
					<div class="row justify-content-center mx-2 mb-1">
						<div class="col-md-6 p-0">
							<form action="index.php?module=forum&action=ajoutCom&idQcm='.$id_qcm.'" method="POST">
								<textarea name="commentaire" class="form-control border border-secondary rounded d-block mb-3 p-2" cols="33" placeholder="Votre commentaire..."></textarea>
								<input type="hidden" value='.$token.' name="token" />
								<div class="text-right">
									<button type="submit" class="btn btn-warning">Valider</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				';
			}

			function afficheBase( $choix, $intitule_qcm ) {
				if( $choix === 1 ) {
					echo 
					'			<div class="container bg-white pb-5" style="height:1250px">
				<div class="row pt-5 pb-2">
					<div class="col-md-6 m-3">
						<h3>Forum : '.$intitule_qcm.'</h3>
						<p class="text-muted">Discutez entre vous afin de pouvoir avoir réponse à vos questions!</p>
					</div>
				</div> 
				';
				} else {
					echo '
				</div>';
				}				
			}
		}
?>

