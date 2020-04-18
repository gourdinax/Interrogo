$(document).ready( function() {
	$.ajax({
		type: 'GET',
		url: 'api.php?module=classement&action=liste'
	}).done( function(data) {
		var resultat = '<option value=""> Disciplines </option>';
		$.each(data, function(index, value) {
			resultat += '<option value="'+ value.id_disc +'">' + value.intitule_disc + '</option>';
		});
		$("#disciplines-select").html(resultat);
	});

	$.ajax({
		type: 'GET',
		url: 'api.php?module=classement'
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-75 pl-4">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="text-center">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="w-75 pl-4">' +
								 value.utilisateur + 
							'</td>' +
							'<td scope="col" class="text-center">' +
								value.note +
							'</td>' +
						'</tr>';
		});
		$("#table-result-classement").find("tbody").html(resultat);
	});
});

$("#recherche-classement").on('reset', function(e) {
	$.ajax({
		type: 'GET',
		url: 'api.php?module=classement&action=liste'
	}).done( function(data) {
		var resultat = '<option value=""> Disciplines </option>';
		$.each(data, function(index, value) {
			resultat += '<option value="'+ value.id_disc +'">' + value.intitule_disc + '</option>';
		});
		$("#disciplines-select").html(resultat);
	});

	$.ajax({
		type: 'GET',
		url: 'api.php?module=classement'
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-75 pl-4">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="text-center">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="w-75 pl-4">' +
								 value.utilisateur + 
							'</td>' +
							'<td scope="col" class="text-center">' +
								value.note +
							'</td>' +
						'</tr>';
		});
		$("#table-result-classement").find("tbody").html(resultat);
	});
});

$("#recherche-classement").on('submit', function(e) {
	e.preventDefault();
	$user = $("#recherche-user").val();
	$disc = $("#disciplines-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=classement&user=' + $user + '&disc=' + $disc 
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-75 pl-4">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="text-center">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="w-75 pl-4">' +
								 value.utilisateur + 
							'</td>' +
							'<td scope="col" class="text-center">' +
								value.note +
							'</td>' +
						'</tr>';
		});
		$("#table-result-classement").find("tbody").html(resultat);
	});
});

$('#recherche-user').on('input', function() {
	$("#recherche-classement").submit();
});

$('#disciplines-select').on('change', function() {
	$("#recherche-classement").submit();
});