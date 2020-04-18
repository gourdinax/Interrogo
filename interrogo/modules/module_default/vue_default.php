<?php

	include_once './vue_generique.php';

	class VueDefault extends vueGenerique{

		function affichageIndex() {

			echo '
				<!-- DEVISE -->
			
				<div class="container" style="height:1250px">
					<div class="row justify-content-center py-5" style="background-image:url(images/qcm-bg.jpg); background-size: cover">
						<div class="col-md-8 text-center my-5">
							<div class="card border-0 bg-transparent my-5">
								<div class="card-body">
									<blockquote class="blockquote mb-0">
										<h3>"Toute connaissance est une réponse à une question."</h3>
										<footer class="blockquote-footer"><cite>Gaston Bachelard (1884 - 1962)</cite></footer>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
					<div class="row justify-content-center text-center bg-white shadow-lg" style="border-radius: 5px 5px 0px 0px">
						<div class="col-md-4 my-3">
							<div class="card shadow" style="height: 250px">
								<div class="card-header bg-danger border border-bottom border-white text-white">
									<h4>Découvrez</h4>
								</div>
								<div class="card-body bg-danger text-white">
									Un site innovant et intuitif, une liste de disciplines et de questionnaires augmentant jour après jour. Partez à la découverte d\'une multitude de sujets afin de pouvoir en apprendre plus.
								</div>
							</div>
						</div>
						<div class="col-md-4 my-3">
							<div class="card shadow" style="height: 250px">
								<div class="card-header bg-success border border-bottom border-white text-white">
									<h4>Évoluez</h4>
								</div>
								<div class="card-body bg-success text-white">
									Visualisez vos résultats et votre classement sur chacun des QCM faits, essayez d\'obtenir un meilleur score et progressez sur des notions diverses et variées.
								</div>
							</div>
						</div>
						<div class="col-md-4 my-3">
							<div class="card shadow" style="height: 250px">
								<div class="card-header bg-primary border border-bottom border-white text-white">
									<h4>Exprimez-vous</h4>
								</div>
								<div class="card-body bg-primary text-white">
									Donnez nous votre avis sur l\'évaluation que vous venez de passer dans l\'espace forum disponible à la fin de chaque questionnaire. 
								</div>
							</div>
						</div>
					</div>
					<div class="h-50">
						<div class="row justify-content-center text-center bg-white h-100">
							<div class="col-md-6">
								<div class="card shadow h-75">
									<div class="card-header bg-dark border border-bottom border-white text-white">
										<h4>Comment ça marche ?</h4>
									</div>
									<div class="card-body bg-secondary">
										<img src="images/exhib1.png" alt="display1" class="mt-5"/>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card shadow h-75">
									<div class="card-header bg-dark border border-bottom border-white text-white">
										<h4>Que pouvez-vous en tirer ?</h4>
									</div>
									<div class="card-body bg-secondary text-white pt-5">
										<p class="mt-4">Vous ne pouvez qu\'en tirer du bon !</p>
										<p>Tout ce que vous entreprenez ici vous sera utile ! Apprenez de vos erreurs ! Avancez !</p>
										<p>Le courage n\'est pas de commencer ni de terminer, mais de recommencer.</p>
										<p>La collaboration avec les autres utilisateurs d\'Interrogo ne peut que vous aidez à aller plus loin !</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			';

		}

	}
?>