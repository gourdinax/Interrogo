<?php


	include_once './vue_generique.php';

	class VueQuestion extends vueGenerique{

		function afficheBase() {
			echo 
				'			<div class="container bg-white pb-5" style="height:1250px">
				<div class="row pt-5 pb-2 justify-content-center">
					<div class="col-md-9 m-3 border rounded" style="height:600px"> 
			';			
		}

		function affQuestion($tabQ, $idQ) {
			$tabQ = implode(',', $tabQ[$idQ]);
			echo '<h4 class="m-3">'.$tabQ.'</h4>';
		}

		function affReponse($tabR, $idQ, $id_qcm) {

			$i = 0;
			echo '<form action="./index.php?module=question&idQuestion='.$idQ.'&id='.$id_qcm.'&action=valider" method="POST">';
			foreach($tabR as $ld) {
				$i+=1;
					echo '
					<div class="row ml-4 mb-2">
						<div class="col-md-1">
							<input type="radio" name="choix" value="'.$i.'" required />
						</div>
						<div class="col-md-4" style="margin-left:-20px">
							<span>'.$ld['intitule_res'].'</span>
						</div>
					</div>';
			}
			echo '<button type="submit" class="btn btn-warning ml-4 my-3 d-inline-block">Valider</button>
			</form>';

		}

		function affMenu($idQ, $id_qcm){

			echo 
						'<a href="./index.php?module=question&idQuestion='.$idQ.'&id='.$id_qcm.'&action=suivant" method="POST" class="btn btn-secondary ml-4 mb-3">Suivant</a>
					</div>
				</div>
			</div>';
		}

		function affFinScore1($score, $scoreAncien){
			echo '<h5 class="m-3"> Votre nouveau score est '.$score.', votre ancien meilleur score était '.$scoreAncien.'</h5>';

		}

		function affFinScore2($score){

			echo '<h5 class="m-3">Votre score est '.$score.'</h5>';

		}

		function affFinScore3($score, $scoreAncien){

			echo '			<p class="text-center mt-5">Votre score est '.$score.'</p><p>votre meilleur score est '.$scoreAncien.'</p>';

		}

		function affFinGlobal($id_qcm, $id_disc){
			echo 
						'
						<a href="index.php?module=forum&idQcm='.$id_qcm.'" method="POST" class="btn btn-warning">Forum</a>
						<a href="index.php?module=qcm&id='.$id_disc.'" method="POST" class="btn btn-warning">Retour aux QCM</a>
					</div>
				</div>
			</div>
	';
		}

		function bonneRepAff($score){

			echo '<h5 class="m-3">Bonne réponse, votre score est '.$score.'</h5>';

		}

		function mauvaiseRepAff($score){

			echo '<h5 class="m-3">Mauvaise réponse, votre score est '.$score.'</h5>';

		}
	}
?>