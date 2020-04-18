<?php
	include_once './vue_generique.php';

	class VueClassement extends vueGenerique{

		function afficheBase() {
?>
		<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
				<div class="col-md-6 m-3">
					<a href="./index.php?module=discipline" class="btn btn-light border mr-2 mb-3">Disciplines</a>
					<a href="./index.php?module=utilisateur" class="btn btn-light border mb-3">Utilisateur</a>
					<h3>Classement</h3>
					<p class="text-muted">Ici, vous pourrez voir le classement de tous les autres utilisateurs en fonction de leur score durement gagné !</p>
				</div>
			</div>
			<div class="row justify-content-center mt-3">
				<div class="col-md-9">
					<form method="POST" id="recherche-classement">
						<div class="input-group">
							<input type="text" name="recherche_user" id="recherche-user" placeholder="Utilisateur" class="form-control w-50" />
							<select id="disciplines-select" placeholder="Disciplines" class="form-control">
							</select>
							<button type="reset" class="btn btn-outline-danger">⟳</button>
						</div>
					</form>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9">
					<table class="table table-striped" id="table-result-classement">
						<thead class="thead thead-dark">
							<tr>
								<th scope="col" class="w-75 pl-4">Utilisateur</th>
								<th scope="col" class="text-center">Score</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div> 
		<script src="./lib/js/classement/recherche.js"></script>
<?php
			}
		}

?>

