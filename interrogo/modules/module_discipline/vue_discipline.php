<?php

	include_once './vue_generique.php';

	class VueDiscipline extends vueGenerique{

		function afficheBase($choix) {
			if($choix === 1) {
				echo 
					'		<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
				<div class="col-md-6 m-3">
					<a href="./index.php?module=discipline" class="btn btn-light border mb-3">Disciplines</a>
					<h3>Création d\'une discipline</h3>
					<p class="text-muted">Ici, vous pourrez créer votre propre discipline.</p>
				</div>
			</div> 
				';
			} else { 
				echo 
					'		<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
				<div class="col-md-6 m-3">
					<a href="./index.php?module=default" class="btn btn-light border mb-3">Accueil</a>
					<h3>Liste des disciplines</h3>
					<p class="text-muted">Ici, vous avez la possibilité de pouvoir naviguer à travers la liste de toutes les disciplines disponibles.</p>
				</div>
			</div>
			<div class="row"> 
				';
			}
		}

		function menu($droit) {
			if( $droit == 1 ) {
				echo '
				<div class="col-md-6 ml-3 mb-3">
					<a href="./index.php?module=discipline&action=formAjoutDisc" class="btn btn-danger px-4 py-2" style="text-decoration: none; color: white">
						Ajouter une discipline
					</a>
				</div>
			</div>
			<div class="row justify-content-center mt-3">
				<div class="col-md-9">
					<form method="POST" id="recherche-discipline">
						<div class="input-group">
							<input type="text" name="disc" placeholder="Intitulé" class="form-control" id="input-discipline"/>
							<button type="reset" class="btn btn-outline-danger">⟳</button>
						</div>
					</form>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9">
					<table class="table table-striped" id="table-result-discipline">
						<thead class="thead thead-dark">
							<tr>
								<th scope="col" class="pl-4 w-25">Intitulé</th>
								<th scope="col" class="w-75">Description</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<script src="./lib/js/discipline/recherche.js"></script>
	';
			} else {
				echo '
		</div>
		<div class="row justify-content-center mt-3">
			<div class="col-md-9">
				<form method="POST" id="recherche-discipline">
					<div class="input-group">
						<input type="text" name="disc" placeholder="Intitulé" class="form-control" id="input-discipline"/>
						<button type="reset" class="btn btn-outline-danger">⟳</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-9">
				<table class="table table-striped" id="table-result-discipline">
					<thead class="thead thead-dark">
						<tr>
							<th scope="col" class="pl-4 w-25">Intitulé</th>
							<th scope="col" class="w-75">Description</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="./lib/js/discipline/recherche.js"></script>
	';
			}
			
		}

		function formulaireAjoutDiscipline($token) {
			 echo '<div class="row pb-5">
					<div class="col-md-9 ml-3 pb-5">
						<form action="./index.php?module=discipline&action=ajoutDisc" method="POST" id="form_ajout_discipline">
							<label for="intitule_disc" class="d-block">Intitulé de la discipline</label>
							<input type="text" name="intitule_disc" placeholder="Intitulé" class="mb-4 py-2 pl-2 w-50 form-control d-inline-block" required /><div class="obl ml-3 d-inline-block" style="color:red">*</div>
							<input type="hidden" value='.$token.' name="token" />
							<label for="desc_qcm" class="d-block">Description de la discipline</label>
							<textarea class="w-75 p-2 form-control d-inline-block" type="text" name="desc_disc" placeholder="Description" rows="3" required ></textarea><div class="obl ml-3 mb-4 d-inline-block" style="color:red">*</div>
							<p class="mt-2"><span style="color:red">*</span> Champs obligatoires</p> 
							<button type="submit" class="btn btn-warning mt-2 px-4 d-block">Ajouter</button>
						</form>
					</div>
				</div>
			</div>
	';
		}
	}
?>

