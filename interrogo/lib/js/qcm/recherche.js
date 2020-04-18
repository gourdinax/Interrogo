$(document).ready( function() {
	$disc = $("#disc-hidden").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=qcm&action=liste&disc=' + $disc
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-75">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="w-75">' +
								'<a href="./index.php?module=question&idQuestion=0&id=' + value.id_qcm + '" class="text-decoration-none">' + value.intitule_qcm + ' : ' + value.desc_qcm + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
						'</tr>';
		});
		$("#table-result-qcm").find("tbody").html(resultat);
	});
});

$("#recherche-qcm").on('reset', function() {
	$disc = $("#disc-hidden").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=qcm&action=liste&disc=' + $disc
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-75">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col">' +
								'<a href="./index.php?module=question&idQuestion=0&id=' + value.id_qcm + '" class="text-decoration-none">' + value.intitule_qcm + ' : ' + value.desc_qcm + '</a>' +
							'</td>' +
							'<td scope="col">' +
								value.auteur +
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
	$disc = $("#disc-hidden").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=qcm&action=liste&disc=' + $disc + '&user=' + $user +'&qcm=' + $qcm
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-75">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="w-75">' +
								'<a href="./index.php?module=question&idQuestion=0&id=' + value.id_qcm + '" class="text-decoration-none">' + value.intitule_qcm + ' : ' + value.desc_qcm + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
						'</tr>';
		});
		$("#table-result-qcm").find("tbody").html(resultat);
	});
});

$('#recherche-input').on('input', function() {
	$("#recherche-qcm").submit();
});

$('#auteur-input').on('input', function() {
	$("#recherche-qcm").submit();
});