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

		$('#list_instituicao_detalhes').removeClass('active active_tab1');
		$('#list_instituicao_detalhes').removeAttr('href data-toggle');
		$('#instituicao_detalhes').removeClass('active');
		$('#list_instituicao_detalhes').addClass('inactive_tab1');

		// Ativando outra aba no menu
		$('#list_diagnostico_censitario').removeClass('inactive_tab1');
		$('#list_diagnostico_censitario').addClass('active_tab1 active');
		$('#list_diagnostico_censitario').attr('href', '#diagnostico_censitario');
		$('#list_diagnostico_censitario').attr('data-toggle', 'tab');
		$('#diagnostico_censitario').addClass('active in');
		
	});

	$('#btn_previous_diagnostico').click(function(){
		$('#list_diagnostico_censitario').removeClass('active active_tab1');
		$('#list_diagnostico_censitario').removeAttr('href data-toggle');

		$('#diagnostico_censitario').removeClass('active in');
		$('#list_diagnostico_censitario').addClass('inactive_tab1');

		$('#list_instituicao_detalhes').removeClass('inactive_tab1');
		$('#list_instituicao_detalhes').addClass('active_tab1 active');

		$('#list_instituicao_detalhes').attr('href', '#instituicao_detalhes');

		$('#list_instituicao_detalhes').attr('data-toggle', 'tab');
		$('#instituicao_detalhes').addClass('active in');
	});

	// Diagnostico proximo
	$('#btn_diagnostico_next').click(function(){

		$('#list_diagnostico_censitario').removeClass('active active_tab1');
		$('#list_diagnostico_censitario').removeAttr('href data-toggle');

		$('#diagnostico_censitario').removeClass('active');
		$('#list_diagnostico_censitario').addClass('inactive_tab1');

		$('#list_plano_trabalho_etnico').removeClass('inactive_tab1');
		$('#list_plano_trabalho_etnico').addClass('active_tab1 active');

		$('#list_plano_trabalho_etnico').attr('href', '#plano_trabalho');
		
		$('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
		$('#plano_trabalho').addClass('active in');
	});

	$('#btn_previous_plano_trabalho').click(function(){
		$('#list_plano_trabalho_etnico').removeClass('active active_tab1');
		$('#list_plano_trabalho_etnico').removeAttr('href data-toggle');

		$('#plano_trabalho').removeClass('active in');
		$('#list_plano_trabalho_etnico').addClass('inactive_tab1');

		$('#list_diagnostico_censitario').removeClass('inactive_tab1');
		$('#list_diagnostico_censitario').addClass('active_tab1 active');

		$('#list_diagnostico_censitario').attr('href', '#diagnostico_censitario');
		$('#list_diagnostico_censitario').attr('data-toggle', 'tab');
		$('#diagnostico_censitario').addClass('active in');
	});

	//Button Proximo plano de trabalho
	$('#btn_plano_trabalho_next').click(function(){
		$('#list_plano_trabalho_etnico').removeClass('active active_tab1');
		$('#list_plano_trabalho_etnico').removeAttr('href data-toggle');

		$('#plano_trabalho').removeClass('active');
		$('#list_plano_trabalho_etnico').addClass('inactive_tab1');

		$('#list_cronograma').removeClass('inactive_tab1');
		$('#list_cronograma').addClass('active_tab1 active');

		$('#list_cronograma').attr('href', '#cronograma');
		
		$('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
		$('#cronograma').addClass('active in');
	});
	// Button previos Cronograma
	$('#btn_previous_cronograma').click(function(){
		$('#list_cronograma').removeClass('active active_tab1');
		$('#list_cronograma').removeAttr('href data-toggle');

		$('#cronograma').removeClass('active in');
		$('#list_cronograma').addClass('inactive_tab1');

		$('#list_plano_trabalho_etnico').removeClass('inactive_tab1');
		$('#list_plano_trabalho_etnico').addClass('active_tab1 active');

		$('#list_cronograma').attr('href', '#cronograma');
		$('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
		$('#plano_trabalho').addClass('active in');
	});
	//Button proximo plano de trabalho
	$('#btn_plano_next').click(function(){
		$('#list_cronograma').removeClass('active active_tab1');
		$('#list_cronograma').removeAttr('href data-toggle');

		$('#cronograma').removeClass('active');
		$('#list_cronograma').addClass('inactive_tab1');

		$('#list_parceiras').removeClass('inactive_tab1');
		$('#list_parceiras').addClass('active_tab1 active');

		$('#list_parceiras').attr('href', '#parceiras');
		
		$('#list_cronograma').attr('data-toggle', 'tab');
		$('#parceiras').addClass('active in');
	});
	// Button Anterior Parceiras
	$('#btn_previous_parceiras').click(function(){
		$('#list_parceiras').removeClass('active active_tab1');
		$('#list_parceiras').removeAttr('href data-toggle');

		$('#parceiras').removeClass('active in');
		$('#list_parceiras').addClass('inactive_tab1');

		$('#list_cronograma').removeClass('inactive_tab1');
		$('#list_cronograma').addClass('active_tab1 active');

		$('#list_cronograma').attr('href', '#cronograma');
		$('#list_cronograma').attr('data-toggle', 'tab');
		$('#cronograma').addClass('active in');
	});
	// Button proximo parceiras
	$('#btn_next_parceiras').click(function(){
		$('#list_parceiras').removeClass('active active_tab1');
		$('#list_parceiras').removeAttr('href data-toggle');

		$('#parceiras').removeClass('active');
		$('#list_parceiras').addClass('inactive_tab1');

		$('#list_metodologia').removeClass('inactive_tab1');
		$('#list_metodologia').addClass('active_tab1 active');

		$('#list_metodologia').attr('href', '#metodologia');
		
		$('#list_metodologia').attr('data-toggle', 'tab');
		$('#metodologia').addClass('active in');
	});
	//Button previos Metodologia
	$('#btn_metodologia_previous').click(function(){
		$('#list_metodologia').removeClass('active active_tab1');
		$('#list_metodologia').removeAttr('href data-toggle');

		$('#metodologia').removeClass('active in');
		$('#list_metodologia').addClass('inactive_tab1');

		$('#list_parceiras').removeClass('inactive_tab1');
		$('#list_parceiras').addClass('active_tab1 active');

		$('#list_parceiras').attr('href', '#parceiras');
		$('#list_parceiras').attr('data-toggle', 'tab');
		$('#parceiras').addClass('active in');
	});
	// Button next Metodologia
	$('#btn_metodologia_next').click(function(){
		$('#list_metodologia').removeClass('active active_tab1');
		$('#list_metodologia').removeAttr('href data-toggle');

		$('#metodologia').removeClass('active');
		$('#list_metodologia').addClass('inactive_tab1');

		$('#list_resultados_esperados').removeClass('inactive_tab1');
		$('#list_resultados_esperados').addClass('active_tab1 active');

		$('#list_resultados_esperados').attr('href', '#resultados_esperados');
		
		$('#list_resultados_esperados').attr('data-toggle', 'tab');
		$('#resultados_esperados').addClass('active in');
	});
	//Button previos Resultados esperados
	$('#btn_resultados_previous').click(function(){
		$('#list_resultados_esperados').removeClass('active active_tab1');
		$('#list_resultados_esperados').removeAttr('href data-toggle');

		$('#resultados_esperados').removeClass('active in');
		$('#list_resultados_esperados').addClass('inactive_tab1');

		$('#list_metodologia').removeClass('inactive_tab1');
		$('#list_metodologia').addClass('active_tab1 active');

		$('#list_metodologia').attr('href', '#metodologia');

		$('#list_metodologia').attr('data-toggle', 'tab');
		$('#metodologia').addClass('active in');
	});
	// Button para adcionar limhas na tabela de CNPJs Adcionais
	AddTableRow = function () {
		var newRow = $("<tr>");
		var cols = "";
		cols += "<td><input type= 'text' class='form-control' id='validationCustom01' placeholder='First name' value=''></td>";


		cols += '<td>';
		cols += '<button onclick="RemoveTableRow(this)" type="button" class="btn btn-danger">Remover Linha</button>';
		cols += '</td>';
		newRow.append(cols);
		$("#tblCNPJsAdicionais").append(newRow);
		return false;
	};
	// Buuton remover linha da Tabela de cnpsj adcionais
	RemoveTableRow = function(handler) {
		var tr = $(handler).closest('tr');

		tr.fadeOut(400, function(){ 
			tr.remove(); 
		});

		return false;
	};
});
// Buuton adcionar linhas na tabela de cronograma
AddTableRowSchedule = function () {
	var newRow = $("<tr>");
	var cols = "";
	// TO-DE FAZER: REQUISIÇÃO AJAX PARA PREENCHER ESSE COMBO BOX
	cols += "<td><select class='form-control form-control-sm'>"
										+"<option>Small select</option>"
										+"<option>Small select</option>"
										+"<option>Small select</option>"
										+"</select></td>";

	cols += "<td><textarea name='address' id='address' class='form-control'></textarea></td>";
	cols += "<td><select class='form-control form-control-sm'>"
										+"<option>1</option>"
										+"<option>2</option>"
										+"<option>3</option>"
										+"<option>4</option>"
										+"<option>5</option>"
										+"<option>6</option>"
										+"</select></td>";

	// cols += "<td><select class='form-control form-control-sm'>"
	// +"	<option>SIM</option>"
	// +	"<option>NÂO</option>"
	// +	"<option>CANCELAR</option>"
	// +"</select></td>";
	cols += "<td><input type='date' class='form-control' id='validationCustom01'  value='' ></td>";


	cols += '<td>';
	cols += '<button onclick="RemoveTableRow(this)" type="button" class="btn btn-danger">Remover Linha</button>';
	cols += '</td>';
	newRow.append(cols);
	$("#tbl_schedules").append(newRow);
	return false;
};