$(document).ready(function () {
	$('#etapa01').hide();
	$('#etapa02').hide();
	$('#etapa03').hide();

	$("#cb_company").change(function(){
		let url = $(this).data('url');
		switch ($(this).val()) {
			case 'Micro(5 a 9 funcionários)':
			$('#etapa01').show();
			break;

			case ( 'Pequena(10 a 12 funcionários)' ):
			$('#etapa01').show();
			break;

			case 'Pequena(13 a 49 funcionários)':
			// Tela de cadastro
		
			window.location.href = url;
			break;

			case 'Média(50 a 99 funcionários)':
			window.location.href = url;
			break;

			case 'Grande(+ de 100 funcionários)':
			window.location.href = url;
			break;

			case 'ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIRAÇÃO DA DIVERSIDADE?':
			$('#etapa03').show();
			break;

			default:
			alert('Por favor selecione a quantidade de funcionário da sua empresa!')
			break;
		}
	});
	$("#cb_company_01").change(function(){
		switch($(this).val()){
			case 'SIM':
			$('#etapa02').show();
			break;

			case'NÃO':
			alert('Agradecemos seu interrese. Sua empresa não preenche os requisitos.')
			break;	
		}
	});

	$("#cb_company_02").change(function(){
		switch($(this).val()){
			case 'SIM':
			let url = $(this).data('url');
			window.location.href = url;
			break;

			case'NÃO':
			alert('Agradecemos seu interrese. Sua empresa não preenche os requisitos.');
			break;	
		}
	});
	$("#cb_company_03").change(function(){
		switch($(this).val()){
			case 'SIM':
			let url = $(this).data('url');
			window.location.href = url;
			break;

			case'NÃO':
			alert('Agradecemos seu interrese. Sua empresa não preenche os requisitos.')
			break;	
		}
	});
});