$(document).ready( function() {
	$etat = $("#etat-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=gestion&action=liste&etat=' + $etat
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-25">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			$etat = '';
			$lien = '';
			( value.validation == 0 ? $etat += ' btn-danger"> Invalide' : $etat += ' btn-success"> Validé' );
			( value.validation == 0 ? $lien += 'valider' : $lien += 'plusvalider' );

			resultat += '<tr>' +
							'<td scope="col" class="w-25">' +
								'<a href="./index.php?module=question&idQuestion=0&id=' + value.id_qcm + '" class="text-decoration-none">' + value.intitule_qcm + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
							'<td scope="col" class="text-center">' + 
								'<a href="./index.php?module=gestion&idQcm=' + value.id_qcm + '&action=' + $lien + '" class="btn-etat btn ' +
									$etat +
								'</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-qcm").find("tbody").html(resultat);
	});
});

$("#recherche-qcm").on('reset', function() {
	$etat = $("#etat-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=gestion&action=liste&etat=' + $etat
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-25">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			$etat = '';
			$lien = '';
			( value.validation == 0 ? $etat += ' btn-danger"> Invalide' : $etat += ' btn-success"> Validé' );
			( value.validation == 0 ? $lien += 'valider' : $lien += 'plusvalider' );

			resultat += '<tr>' +
							'<td scope="col" class="w-25">' +
								'<a href="./index.php?module=question&idQuestion=0&id=' + value.id_qcm + '" class="text-decoration-none">' + value.intitule_qcm + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
							'<td scope="col" class="text-center">' + 
								'<a href="./index.php?module=gestion&idQcm=' + value.id_qcm + '&action=' + $lien + '" class="btn-etat btn ' +
									$etat +
								'</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-qcm").find("tbody").html(resultat);
	});
});

$("#recherche-qcm").on('submit', function(e) {
	e.preventDefault();
	$qcm = $("#recherche-input").val();	
	$user = $("#auteur-input").val();
	$etat = $("#etat-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=gestion&action=liste&etat=' + $etat + '&user=' + $user + '&qcm=' + $qcm
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-25">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			$etat = '';
			$lien = '';
			( value.validation == 0 ? $etat += ' btn-danger"> Invalide' : $etat += ' btn-success"> Validé' );
			( value.validation == 0 ? $lien += 'valider' : $lien += 'plusvalider' );

			resultat += '<tr>' +
							'<td scope="col" class="w-25">' +
								'<a href="./index.php?module=question&idQuestion=0&id=' + value.id_qcm + '" class="text-decoration-none">' + value.intitule_qcm + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
							'<td scope="col" class="text-center">' + 
								'<a href="./index.php?module=gestion&idQcm=' + value.id_qcm + '&action=' + $lien + '" class="btn-etat btn ' +
									$etat +
								'</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-qcm").find("tbody").html(resultat);
	});
});

$('tbody-result').on('click', '.btn-etat', function(e) {
	e.preventDefault();
});

$('#recherche-input').on('input', function() {
	$("#recherche-qcm").submit();
});

$('#auteur-input').on('input', function() {
	$("#recherche-qcm").submit();
});

$('#etat-select').on('change', function() {
	$("#recherche-qcm").submit();
});