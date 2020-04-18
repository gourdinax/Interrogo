$(document).ready( function() {
	$.ajax({
		type: 'GET',
		url: 'api.php?module=discipline&action=liste'
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="pl-4">' +
									'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		} 
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="pl-4">' +
								'<a href="./index.php?module=qcm&id=' + value.id_disc + '">' + value.intitule_disc + '</a>' +
							'</td>' +
							'<td scope="col">' +
								'<a href="./index.php?module=qcm&id=' + value.id_disc + '">' + value.desc_disc + '</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-discipline").find("tbody").html(resultat);
	});
});

$("#recherche-discipline").on('reset', function() {
	$.ajax({
		type: 'GET',
		url: 'api.php?module=discipline&action=liste'
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="pl-4">' +
									'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="pl-4">' +
								'<a href="./index.php?module=qcm&id=' + value.id_disc + '">' + value.intitule_disc + '</a>' +
							'</td>' +
							'<td scope="col">' +
								'<a href="./index.php?module=qcm&id=' + value.id_disc + '">' + value.desc_disc + '</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-discipline").find("tbody").html(resultat);
	});
});

$("#recherche-discipline").on('submit', function(e) {
	e.preventDefault();
	$disc = $("#input-discipline").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=discipline&action=liste&disc=' + $disc
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="pl-4">' +
									'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="pl-4">' +
								'<a href="./index.php?module=qcm&id=' + value.id_disc + '">' + value.intitule_disc + '</a>' +
							'</td>' +
							'<td scope="col">' +
								'<a href="./index.php?module=qcm&id=' + value.id_disc + '">' + value.desc_disc + '</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-discipline").find("tbody").html(resultat);
	});
});

$('#recherche-discipline').on('input', function() {
	$("#recherche-discipline").submit();
});