<?php
	define( '_NOEXEC', true);
	session_start();

	include_once './Connexion.php';

	Connexion::initConnexion();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Interrogo - La connaissance n'a aucune limite</title>
		<link rel="icon" type="image/x-icon" href="images/logo.ico">
		<link rel="stylesheet" href="styleIndex.css">
		<link rel="stylesheet" href="lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>	
		<script src="lib/jquery/jquery-3.4.1.min.js" ></script>
		<script src="lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	</head>
	<body class="m-auto" style="background-image:url(images/hero-bg-front.png); background-size: 100% auto; background-repeat: no-repeat">
		<!-- NAV -->
		<header class="sticky-top">
			<!-- HIDDEN NAV -->
			<div class="collapse bg-dark align-items-center" id="navbarHeader">
				<div class="container">
					<div class="row align-items-start pt-3" id="nav-modules">
						<?php
							include_once 'modules/module_navigation/mod_navigation.php';
							$moduleObj = new ModNavigation();
						?>
					</div>
				</div>
			</div>
			<!-- TOP BAR NAV -->
			<div class="navbar navbar-dark bg-dark shadow">
				<div class="container d-flex justify-content-between">
					<a href="index.php" class="text-white text-decoration-none">
						<img src ="images/logo.png" alt="logo Interrogo" style="width:3.5em" class="mr-3"/>
						Une plateforme d'apprentissage collaboratif sous forme de QCM
					</a>
					<button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
						<!--<span class="navbar-toggler-icon"></span>--><span>Menu</span>
					</button>
				</div>
			</div>
		</header>
			<?php

				if ( isset($_GET['module']) ) {
					$module = $_GET['module'];
				} else {
					$module = 'default';
				}
				
				switch ($module) {

					case "default":
						include_once 'modules/module_default/mod_default.php';
						$moduleObj = new ModDefault();
						break;

					case "galerie":
						include_once 'modules/module_galerie/mod_galerie.php';
						$moduleObj = new ModGalerie();
						break;

					case "panier":
						include_once 'modules/module_panier/mod_panier.php';
						$moduleObj = new ModPanier();
						break;	

				}

				$aff = $moduleObj->controleur->vue->getAffichage();
				$vueGenerique = new vueGenerique();
				echo $aff;
		?>
		<footer class="footer footer-big bg-dark text-white col-12" style="bottom: 0">
			<div class="container">
				<div class="content">
					<div class="row text-justify">
						<div class="col-md-12 mt-4">
							<p class="text-center font-italic"> Site conçu par Axel Gourdin, Mathieu Pellan et Mehdi Aberkane dans le cadre du projet web à l'IUT de Montreuil </p>
							<p class="text-center font-italic" style="font-size: 12px">Aide ou suggestion, contact par mail à l'adresse suivante : <a href="mailto:aide-interrogo[at]support-interrogo.fr">aide-interrogo[at]support-interrogo.fr</a></p>
						</div>
					</div>
					</div>
					<hr class="col-12" style="background-color: white">
					<div class="row">
						<div class="col-md-12 text-center mb-4">
							Copyright <script>
							document.write(new Date().getFullYear())
							</script> Interrogo All Rights Reserved.
						</div>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>