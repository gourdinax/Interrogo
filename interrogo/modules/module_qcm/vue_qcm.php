<?php
	include_once './vue_generique.php';

	class VueQcm extends vueGenerique{

		function afficheBase($choix, $id) {
			if($choix === 1) {
				echo 
					'			<div class="container bg-white pb-5" style="height:1250px">
				<div class="row pt-5 pb-2">
					<div class="col-md-6 m-3">
						<a href="./index.php?module=qcm&id='.$id.'" class="btn btn-light border mb-3">Retour</a>
						<h3>Création de QCM</h3>
						<p class="text-muted">Ici, vous pourrez créer votre propre QCM avec des questions adaptées et en rapport avec la discipline et le sujet proposé.</p>
					</div>
				</div> 
				';
			} else {
				echo 
					'			<div class="container bg-white pb-5" style="height:1250px">
				<div class="row pt-5 pb-2">
					<div class="col-md-6 m-3">
						<a href="./index.php?module=discipline" class="btn btn-light border mb-3">Disciplines</a>
						<h3>Liste des QCM</h3>
						<p class="text-muted">Ici, vous avez la possibilité de pouvoir faire quelconque QCM mis à votre disposition.</p>
					</div>
				</div>
				<div class="row"> 
				';
			}
			
		}

		function menu($id) {
			echo '	<div class="col-md-6 ml-3 mb-3">
						<a href="./index.php?module=qcm&action=formAjoutQcm&id='.$id.'" class="btn btn-danger px-4 py-2" style="text-decoration: none; color: white">
							Ajouter un QCM
						</a>
					</div>
				</div>
				<div class="row justify-content-center mt-3">
					<div class="col-md-9">
						<form method="POST" id="recherche-qcm">
							<div class="input-group">
								<input type="text" name="recherche_titre" placeholder="Intitulé" class="form-control w-50" id="recherche-input" />
								<input type="text" name="recherche_auteur" placeholder="Auteur" class="form-control" id="auteur-input" />
								<input type="hidden" name="disc" value="'.$id.'" id="disc-hidden" />
								<button type="reset" class="btn btn-outline-danger">⟳</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-9">
						<table class="table table-striped" id="table-result-qcm">
							<thead class="thead thead-dark">
								<tr>
									<th scope="col">Intitulé</th>
									<th scope="col">Auteur</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<script src="./lib/js/qcm/recherche.js"></script>
		';
		}

	function formulaireAjoutQcm($id, $user, $token) {
			echo '
				<div class="row pb-5">
					<div class="col-md-9 ml-3 pb-5">
						<form action="./index.php?module=qcm&action=formAjoutQcmQR&idQ=-1&id='.$id.'" method="POST" id="form_ajout_qcm">
							<label for="intitule_qcm" class="d-block">Intitulé du QCM</label>
							<input type="text" name="intitule_qcm" placeholder="Intitulé" class="mb-4 py-2 pl-2 w-50 form-control d-inline-block" required /><div class="obl ml-3 d-inline-block" style="color:red">*</div>
							<label for="desc_qcm" class="d-block">Description du QCM</label>
							<textarea class="w-75 p-2 form-control d-inline-block" type="text" name="desc_qcm" placeholder="Description" rows="3" required ></textarea><div class="obl ml-3 mb-4 d-inline-block" style="color:red">*</div>
							<input type="hidden" name="auteur" value='.$user.' />
							<input type="hidden" value='.$token.' name="token" />
							<p class="mt-2"><span style="color:red">*</span> Champs obligatoires</p> 
							<button type="submit" class="btn btn-warning mt-2 px-4 d-block">Ajouter</button>
						</form>
					</div>
				</div>
			</div>
		';
		}

		function formAjoutQcmQR($id, $id_qcm, $idQ, $token) {
			$btn = '<a href="./index.php?module=qcm&id='.$id.'" class="btn btn-light border mb-4">Laisser à '.($idQ+1).' questions</a>';

			echo '<div class="row pb-5">
					<div class="col-md-9 ml-3 pb-5">';
						if( $idQ > 0 ) {
							echo $btn;
						}
			echo'<form action="./index.php?module=qcm&action=valider&id='.$id_qcm.'&idQ='.$idQ.'" method="POST">
							<div class="row mb-5">
								<div class="col-12">
									<label for="intitule_ques">Intitulé de la question '.($idQ+1).'</label>
									<input type="text" name="intitule_ques" placeholder="Intitulé" class="form-control w-75" required/>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text bg-transparent">
												<input type="radio" name="choix" value="1" required/>
											</div>
										</div>
										<input type="text" name="rep1" placeholder="Réponse 1" class="form-control" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text bg-transparent">
												<input type="radio" name="choix" value="2" required/>
											</div>
										</div>
										<input type="text" name="rep2" placeholder="Réponse 2" class="form-control" required/>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text bg-transparent">
												<input type="radio" name="choix" value="3" required/>
											</div>
										</div>
										<input type="text" name="rep3" placeholder="Réponse 3" class="form-control" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text bg-transparent">
												<input type="radio" name="choix" value="4" required/>
											</div>
										</div>
										<input type="text" name="rep4" placeholder="Réponse 4" class="form-control" required/>
									</div>
								</div>
							</div>
							<p class="mt-2">Pensez à cocher une correcte réponse</p> 
							<input type="hidden" value='.$token.' name="token" />
							<button type="submit" class="btn btn-warning">Valider</button>
						</form>
					</div>
				</div>
			</div>
	';

		}

	}
?>

