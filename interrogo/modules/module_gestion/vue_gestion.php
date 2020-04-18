<?php
	include_once './vue_generique.php';

	class VueGestion extends vueGenerique {

		function afficheBase() {
			echo 
				'			<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
				<div class="col-md-6 m-3">
					<h3>Gestion administrateur</h3>
					<p class="text-muted">Ici, vous pourrez gérer la gestion des QCM à valider.</p>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6">
					<form method="POST" id="recherche-qcm">
						<div class="input-group">
							<input type="text" name="recherche_titre" placeholder="Intitulé" class="form-control w-25" id="recherche-input" />
							<input type="text" name="recherche_auteur" placeholder="Auteur" class="form-control w-25" id="auteur-input" />
							<select name="etat" class="form-control" id="etat-select">
								<option value="0">Invalide</option>
								<option value="1">Validé</option>
							</select>
							<button type="reset" class="btn btn-outline-danger">⟳</button>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped" id="table-result-qcm">
						<thead class="thead thead-dark text-center">
							<tr>
								<th scope="col" class="w-50">Intitulé</th>
								<th scope="col" class="w-25">Auteur</th>
								<th scope="col" class="w-25">État</th>
							</tr>
						</thead>
						<tbody id="tbody-result">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="./lib/js/gestion/gestion.js"></script> 
			';
			
		}

		function affQCMAValide($tab){


			foreach($tab as $ld) {
							echo '
								<tr>
									<td scope="col">
										'.$ld['intitule_qcm'].'
									</td>
									<td scope="col">
										'.$ld['auteur'].'
									</td>
									<td scope="col">
										<a href="./index.php?module=gestion&idQcm='.$ld['id_qcm'].'&action=valider" class="btn btn-success">Valider</a>
									</td>
								</tr>
							';
				}

		}

		function affQCMValide($tab){

			foreach($tab as $ld) {
							echo '
								<tr>
									<td scope="col">
										'.$ld['intitule_qcm'].'
									</td>
									<td scope="col">
										'.$ld['auteur'].'
									</td>
									<td scope="col">
										<a href="./index.php?module=gestion&idQcm='.$ld['id_qcm'].'&action=plusvalider" class="btn btn-danger">Ne plus valider</a>
									</td>
								</tr>
							';
				}

		}

	}
		  
?>