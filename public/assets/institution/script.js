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
	// Menu de cadastro de instituição.
	$('#btn_indentificacao').click(function(){

		$('#list_login_details').removeClass('active active_tab1');
		$('#list_login_details').removeAttr('href data-toggle');
		$('#login_details').removeClass('active');
		$('#list_login_details').addClass('inactive_tab1');
		$('#list_personal_details').removeClass('inactive_tab1');
		$('#list_personal_details').addClass('active_tab1 active');
		$('#list_personal_details').attr('href', '#personal_details');
		$('#list_personal_details').attr('data-toggle', 'tab');
		$('#personal_details').addClass('active in');
		
	});

	$('#btn_previous_diagnostico').click(function(){
		$('#list_personal_details').removeClass('active active_tab1');
		$('#list_personal_details').removeAttr('href data-toggle');
		$('#personal_details').removeClass('active in');
		$('#list_personal_details').addClass('inactive_tab1');
		$('#list_login_details').removeClass('inactive_tab1');
		$('#list_login_details').addClass('active_tab1 active');

		$('#list_login_details').attr('href', '#login_details');

		$('#list_login_details').attr('data-toggle', 'tab');
		$('#login_details').addClass('active in');
	});

	$('#btn_diagnostico_next').click(function(){

		$('#list_personal_details').removeClass('active active_tab1');
		$('#list_personal_details').removeAttr('href data-toggle');
		$('#personal_details').removeClass('active');
		$('#list_personal_details').addClass('inactive_tab1');
		$('#list_contact_details').removeClass('inactive_tab1');
		$('#list_contact_details').addClass('active_tab1 active');

		$('#list_contact_details').attr('href', '#contact_details');
		
		$('#list_contact_details').attr('data-toggle', 'tab');
		$('#contact_details').addClass('active in');
	});

	$('#previous_btn_contact_details').click(function(){
		$('#list_contact_details').removeClass('active active_tab1');
		$('#list_contact_details').removeAttr('href data-toggle');
		$('#contact_details').removeClass('active in');
		$('#list_contact_details').addClass('inactive_tab1');
		$('#list_personal_details').removeClass('inactive_tab1');
		$('#list_personal_details').addClass('active_tab1 active');
		$('#list_personal_details').attr('href', '#personal_details');
		$('#list_personal_details').attr('data-toggle', 'tab');
		$('#personal_details').addClass('active in');
	});

	$('#btn_contact_details').click(function(){
			$('#btn_contact_details').attr("disabled", "disabled");
			$(document).css('cursor', 'prgress');
			$("#register_form").submit();

	});
});