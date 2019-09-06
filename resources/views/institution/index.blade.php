@extends('layouts.site')

@section('title', 'Intentificação da empresa')

@section('content')

<h1>Cadastro da Instituição</h1>
{{-- Modal para messagem de campos invalidos --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalErrorCad">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Atenção: Há campos invalidos!</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning" style="display: none; " id="danger">
					<ul></ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
{{-- Messagem para requição ajax  --}}
<div class="msg-ajax" id="msg-ajax">
	<h3>Aguarde...</h3>
</div>
<!-- Menu de cadastro da instituição -->
<form method="post" id="register_form">
	@csrf
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_instituicao_detalhes">Indentificação
				da Instituição</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_diagnostico_censitario" style="border:1px solid #ccc">Diagnóstico
				Censitário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_plano_trabalho_etnico" style="border:1px solid #ccc">Plano de
				Trabalho</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_cronograma" style="border:1px solid #ccc">Cronograma</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_parceiras" style="border:1px solid #ccc">Parceiras</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_metodologia" style="border:1px solid #ccc">Metodologia</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_resultados_esperados" style="border:1px solid #ccc">Resultados
				Esperados</a>
		</li>
	</ul>

	@if ($errors->any())
	<div class="alert alert-warning">
		<ul>
			@foreach ($errors->all() as $erro)
			<li>{{$erro}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	{{-- Messagem para validação de cnpj --}}
	@if(session('error-cnpj'))
	<div class="alert alert-danger">
		{{ session('error-cnpj') }}
	</div>
	@endif
	{{-- Messagem para Data  Limite--}}
	@if(session('error-deadline'))
	<div class="alert alert-danger">
		{{ session('error-deadline') }}
	</div>
	@endif
	<!-- Campos de texto para descrever a instituição -->
	<div class="tab-content" style="margin-top:16px; ">
		<div class="tab-pane active" id="instituicao_detalhes">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> IDENTIFICAÇÃO DA INSTITUIÇÃO</strong>
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
							class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Inicio dos Inputs da Instituição-->
					<input type="hidden" name="etapas" value="" id="etapas">
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="name">Nome da Instituição proponente <small class="asterisco-input">*</small>
							</label>
							<input type="text" class="form-control " name="name" id="name"
								placeholder="Nome da Instituição proponente:" value="{{old('name')}}">
						</div>
						<div class="col-md-4 mb-3 ">
							<label for="fantasy_name">Nome para certificação (nome fantasia) <small
									class="asterisco-input">*</small> </label>
							<input type="text" class="form-control" id="fantasy_name"
								placeholder="Nome para certificação (nome fantasia):" value="{{old('fantasy_name')}}"
								name="fantasy_name">
						</div>
						<div class="col-md-4 mb-3">
							<label for="email_two">Classificação da Empresa <small
									class="asterisco-input">*</small></label>
							<select class="form-control form-control-sm" id="company_classification"
								name="company_classification">
								<option value=""></option>
								<option value="1">Micro(5 a 9 funcionários)</option>
								<option>Pequena(10 a 12 funcionários)</option>
								<option>Pequena(13 a 49 funcionários)</option>
								<option>Média(50 a 99 funcionários)</option>
								<option>Grande(+ de 100 funcionários)</option>
								<option>ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIRAÇÃO DA DIVERSIDADE?</option>
								
							</select>
						</div>
						<div class="col-md-4 mb-3">
							<label for="cnpj">CNPJ <small class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="cnpj" placeholder="Informe apenas números"
								value="{{old('cnpj')}}" name="cnpj">
						</div>
						<div class="col-md-4 mb-3">
							<label for="county">Município <small class="asterisco-input">*</small></label>
							<select class="form-control form-control-sm" name="county">
								<option></option>
								<option value="Camaçari">Camaçari</option>
								<option value="Candeias">Candeias</option>
								<option value="Lauro de Freitas">Lauro de Freitas</option>
								<option value="Salvador">Salvador</option>
								<option value="Simões Filho">Simões Filho</option>
							</select>
						</div>
						<div class="col-md-4 mb-3">
							<label for="uf">UF:</label>
							<input type="text" class="form-control" id="uf" value="BA" name="uf" readonly="readonly">
						</div>
						<div class="col-md-4 mb-3">
							<label for="address">Endereço <small class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="address" placeholder="Endereço:"
								value="{{old('address')}}" name="address">
						</div>
						<div class="col-md-4 mb-3">
							<label for="email">E-mail <small class="asterisco-input">*</small></label>
							<input type="email" class="form-control" id="email" placeholder="E-mail"
								value="{{old('email')}}" name="email">
						</div>
						<div class="col-md-4 mb-3">
							<label for="phone">Telefone <small class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="phone" placeholder="Telefone"
								value="{{old('phone')}}" name="phone">
						</div>
						<div class="col-md-4 mb-3">
							<label for="technical_manager">Responsável técnico <small
									class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="technical_manager"
								placeholder="Responsável técnico:" value="{{old('technical_manager')}}"
								name="technical_manager">
						</div>
						<div class="col-md-4 mb-3">
							<label for="formation">Formação <small class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="formation" placeholder="Formação:"
								value="{{old('formation')}}" name="formation">
						</div>
						<div class="col-md-4 mb-3">
							<label for="phone_two">Telefone <small class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="phone_two" placeholder="Telefone:"
								value="{{old('phone_two')}}" name="phone_two">
						</div>
						<div class="col-md-6 mb-3">
							<label for="email_two">Atividade <small class="asterisco-input">*</small></label>
							<select class="form-control form-control-sm" name="institution_activity">
								<option></option>
								<option value="Indústria">Indústria</option>
								<option value="Comércio">Comércio</option>
								<option value="Serviços">Serviços</option>
							</select>
						</div>
						<div class="col-md-6 mb-3">
							<label for="activity_branch">Ramo de atividade <small
									class="asterisco-input">*</small></label>
							<input type="text" class="form-control" id="activity_branch"
								placeholder="Ramo de atividade:" value="{{old('activity_branch')}}"
								name="activity_branch">
						</div>
						<!-- Membros da comiisão -->
						<h5 class="col-md-12 mb-3"> <strong> Recomendamos eleger três colaboradores para tratar da
								questão diversidade na empresa. Eles serão os contatos entre empresa e Comitê Gestor.
								Para melhor andamento do trabalho é indicado, preferencialmente, funcionários dos
								setores de Marketing e gestão de pessoas, e pelo menos um, estar ocupando um cargo de
								decisão.
							</strong></h5>
						<div class="col-md-12 mb-3">
							<table class="table  table-bordered" id="tbl_menbress_comission">
								<thead>
									<tr>
										<th scope="col">Nome do funcionário <small class="asterisco-input">*</small>
										</th>
										<th scope="col">Função / setor <small class="asterisco-input">*</small> </th>
										<th scope="col">Telefone <small class="asterisco-input">*</small></th>
										<th scope="col">E-mail <small class="asterisco-input">*</small></th>
									</tr>
								</thead>
								<tbody>
									@foreach (range(1,3) as $item)
									<tr>
										<td>
											<input type="text" class="form-control" id="members_name" placeholder="Nome"
												value="{{old('members_name[]')}}" name="members_name[]">
										</td>
										<td>
											<input type="text" class="form-control" id="members_function"
												placeholder="Função / setor" value="{{old('members_function[]')}}"
												name="members_function[]">
										</td>
										<td>
											<input type="text" class="form-control members_phone" id="members_phone"
												placeholder="Telefone" value="{{old('members_phone[]')}}"
												name="members_phone[]">
										</td>
										<td>
											<input type="email" class="form-control" id="members_email"
												placeholder="E-mail" value="{{old('members_email[]')}}"
												name="members_email[]">
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<!-- CNPJ Adicionias. Estes campos são opcionais -->
							<div class="container_cnpj_adcional">
								<div class="sub_conatainer_cnpj_adcioanl">
									<table class="table " id="tbl_cnpj_add">
										<thead>
											<tr>
												<th scope="col"> <button onclick="AddTableRowCnpjsAdicionais()"
														type="button" class="btn btn-success">Adicionar mais CNPJs
													</button>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td scope="col" width="950px">
													&nbsp;
													<label>CNPJs Acicionais <small class="asterisco-input-options">*</small></label>
													<input type="text" class="form-control cnpj_additional"
														id="cnpj_additional" placeholder="Informe apenas números"
														name="cnpj_additional[]" value="">
												</td>

												<td>
													&nbsp;
													<label>Excluir</label><br>
													<button onclick="RemoveTableRow(this)" type="button"
														class="btn btn-danger">Remover Linha</button>
												</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
						<br />
						<div align="center">
							<button type="button" name="btn_indentificacao" id="btn_indentificacao"
								class="btn btn-info btn-lg" data-url="{{route('save.institution')}}">Proximo</button>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o Diagnóstico Censitário -->
		<div class="tab-pane fade" id="diagnostico_censitario">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>QUESTIONÁRIO PARA DIAGNÓSTICO CENSITÁRIO</strong>
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
							class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Inicio das Questões -->
					<div class="question-color">
						@foreach ($questionAlternatives as $question)
						<p><strong>{{ $question->name }}</strong></p>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="">
									Resposta <small class="asterisco-input">*</small>
								</label>

								<select class="form-control form-control-sm" name="alternative_id[]">
									<option value=""></option>
									@foreach ($question->alternatives as $alternativa)
									<option value="{{$alternativa->id}}">{{ $alternativa->alternative }}
										{{ old('alternative_id[]') == $alternativa->id ? 'selected' : '' }}</option>
									@endforeach
								</select>
								@if($question->field_option == "SIM")
								<label for="others">Se sim, quais?</label>
								<input type="text" class="form-control" name="others[]" id="others">
								@else
								<input type="hidden" class="form-control" name="others[]" id="others">
								@endif
							</div>

						</div>
						@endforeach
					</div>
					{{-- Tabelas perfil colaborador --}}
					<div class="form-row">
						<div class="form-group col-md-12">
							<h4><strong>Nivel de atividade dos colaboradores:</strong>
							</h4>
							<table class="table" id="tblLevelActivicDemiasGroups">
								<thead>
									<tr>
										<th scope="col">NIVEL DE ATIVIDADE<small class="asterisco-input-options">*</small></th>
										<th scope="col">RAÇA/COR<small class="asterisco-input-options">*</small></th>
										<th scope="col">Nº HOMEMS<small class="asterisco-input-options">*</small></th>
										<th scope="col">Nº MULHERES<small class="asterisco-input-options">*</small></th>
										<th scope="col">RAÇA/COR<small class="asterisco-input-options">*</small></th>
										<th scope="col">Nº HOMEMS<small class="asterisco-input-options">*</small></th>
										<th scope="col">Nº MULHERES<small class="asterisco-input-options">*</small></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Operacional" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
										{{-- Mesclação --}}
										<th>
											<input type="text" class="form-control" id="color"
												value="Demais grupos étnicos-raciais" readonly="readonly"
												name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Supervisão" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
										{{-- Mesclação --}}
										<th>
											<input type="text" class="form-control" id="color"
												value="Demais grupos étnicos-raciais" readonly="readonly"
												name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Gerência / Chefia" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
										{{-- Mesclação --}}
										<th>
											<input type="text" class="form-control" id="color"
												value="Demais grupos étnicos-raciais" readonly="readonly"
												name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level" value="Direção"
												readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
										{{-- Mesclação --}}
										<th>
											<input type="text" class="form-control" id="color"
												value="Demais grupos étnicos-raciais" readonly="readonly"
												name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control human_quantity_activity_level"
												id="human_quantity_activity_level"
												value="{{old('human_quantity_activity_level[]')}}"
												name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control woman_quantity_activity_level"
												id="woman_quantity_activity_level"
												value="{{old('woman_quantity_activity_level[]')}}"
												name="woman_quantity_activity_level[]">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- Final das questões -->
						<br /><br /><br /><br /><br />
						<div align="center">
							<button type="button" name="btn_previous_diagnostico" id="btn_previous_diagnostico"
								class="btn btn-default btn-lg">Anterior</button>
							<button type="button" name="btn_diagnostico_next" id="btn_diagnostico_next"
								class="btn btn-info btn-lg" data-url="{{route('save.institution')}}">Proximo</button>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o plano de trabalho étnico racial -->
		<div class="tab-pane fade" id="plano_trabalho">
			<div class="panel panel-default">
				<div class="panel-heading">PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL APRESENTAÇÃO.
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Inicio do plano de trabalho -->
					<h4>PLANO DE TRABALHO<small class="asterisco-input">*</small></h4>
					<div class="form-textarea">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Explicar brevemente do que trata o plano de
								trabalho, apresentar a organização e mencionar se já está sendo desenvolvido e os
								principais resultados alcançados.
							</label><br />
							<strong>Até 3000 caracteres. <small class="asterisco-input">*</small> </strong>
							<div class="qtd_caracteres">
								<strong>
									<p><small class="caracteres"></small></p>
								</strong>
							</div>
							<textarea class="form-control class_textarea" id="action_plan" rows="3"
								name="action_plan"></textarea>
						</div>
					</div>
					<!-- Final do plano de trabalho -->
					<br />
					<div align="center">
						<button type="button" name="previous_btn_personal_details" id="btn_previous_plano_trabalho"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_instituicacao_next" id="btn_plano_trabalho_next"
							class="btn btn-info btn-lg" data-url="{{route('save.institution')}}">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o cronograma -->
		<div class="tab-pane fade" id="cronograma">
			<div class="panel panel-default">
				<div class="panel-heading">CRONOGRAMA
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Inicio do cronograma -->
					<h4>Cronograma (Data limite de entrega das atividades será <strong> {{date('30/11/Y')}})</strong>
					</h4>
					<h4>Listar todas as atividades necessárias à realização do projeto.</h4>
					<label>
						Autoriza a divulgação destas ações pela SEMUR? <small class="asterisco-input">*</small>
						<select class="form-control-sm" name="authorization">
							<option></option>
							<option value="SIM">SIM</option>
							<option value="NÃO">NÃO</option>
						</select>
					</label>
					<table class="table table-bordered" id="tbl_schedules">
						<thead>
							<tr>
								<th scope="col"> <button onclick="AddTableRowSchedule()" type="button"
										class="btn btn-success">Adicionar Linhas na Tabela </button></th>
							</tr>
							<tr>
								<th scope="col">AÇÕES <small class="asterisco-input">*</small></th>
								<th scope="col">ATIVIDADE(O que é necessário fazer para atingir este objetivo)
									<small class="asterisco-input">*</small></th>
								<th scope="col">QUANTIDADE<small class="asterisco-input">*</small></th>
								<th scope="col">DATA LIMITE <small class="asterisco-input">*</small></th>
								<th scope="col">REMOVER</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td width="300px;">
									<select class="form-control form-control-sm" id="action"
										name="schedule_action_id[]">
										<option></option>
										@foreach ($actions as $item)
										<option value="{{$item->id}}">{{ $item->description}}</option>
										@endforeach
									</select>
								</td>
								<td>
									<textarea id="activity" class="form-control" name="activity[]" value=""></textarea>
								</td>
								<td width="30px;">
									<select class="form-control form-control-sm" name="amount[]">
										<option></option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>12</option>
									</select>
								</td>
								<td>
									<input type="date" class="form-control" id="deadline" value="" name="deadline[]">
								</td>
								<td>
									<button onclick="RemoveTableRow(this)" type="button" class="btn btn-danger">Remover
										Linha</button>
								</td>
							</tr>

						</tbody>
					</table>
					<!-- Final do cronograma -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_cronograma" id="btn_previous_cronograma"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_plano_next" id="btn_plano_next" class="btn btn-info btn-lg"
							data-url="{{route('save.institution')}}">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever as parceiras -->
		<div class="tab-pane fade" id="parceiras">
			<div class="panel panel-default">
				<div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Inicio dos inpust -->
					<h4>PARCERIAS<small class="asterisco-input">*</small></h4>
					<strong>
						(Descrever as parcerias propostas e potenciais, enumerando os parceiros e suas respectivas
						responsabilidades/competências - o que caberá a cada um e/ou áreas das organizações
						envolvidas -
						bem como a natureza das contrapartidas e valor em reais – R$ se houver.)
					</strong>
					<strong>Até 2000 caracteres. </strong>
					<div class="qtd_caracteres">
						<strong>
							<p><small class="caracteres_partners"></small></p>
						</strong>
						<textarea class="form-control class_textarea" id="partners" rows="3" name="partners"></textarea>
					</div>
					<!-- Final dos inputs -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_previous_parceiras"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_next_parceiras" id="btn_next_parceiras"
							class="btn btn-info btn-lg" data-url="{{route('save.institution')}}">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o METODOLOGIA -->
		<div class="tab-pane fade" id="metodologia">
			<div class="panel panel-default">
				<div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Incio dos Inputs -->
					<h4>METODOLOGIA<small class="asterisco-input-options">*</small></h4>
					<strong>
						(Descrever as estratégias a serem utilizadas na intervenção, as etapas do trabalho a serem
						desenvolvidas, os instrumentos, técnicas previstas e registros de sistematização a ser
						utilizado, justificando e fundamentado a escolha adotada. Deve haver compatibilidade entre o
						público alvo do projeto - características do grupo - e a metodologia adotada, indicando o
						potencial do projeto para a sustentabilidade, para o desenvolvimento de lideranças e para a
						participação efetiva da comunidade no processo. O enfoque deve basear-se em metodologia
						participativa, envolvendo a comunidade alvo, se couber).
					</strong>
					<strong>Até 7000 caracteres. </strong>
					<div class="qtd_caracteres">
						<strong>
							<p><small class="methodology_caracteres"></small></p>
						</strong>
						<textarea class="form-control class_textarea" id="methodology" rows="3"
							name="methodology"></textarea>
					</div>
					<!-- Final dos Inpust -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_metodologia_previous"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_contact_details" id="btn_metodologia_next"
							class="btn btn-info btn-lg" data-url="{{route('save.institution')}}">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!--  Campos de texto para descrever resultados esperados -->
		<div class="tab-pane fade" id="resultados_esperados">
			<div class="panel panel-default">
				<div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL
					<div class="legends-forms">
						<strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small class="asterisco-input-ogrigatorio">*</small>
						<strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
					</div>
				</div>
				<div class="panel-body">
					<!-- Inicio dos inputs -->
					<h4>RESULTADOS ESPERADOS<small class="asterisco-input-options">*</small></h4>
					<strong>
						(Enumerar os resultados esperados após a execução do projeto. Explicitar os ganhos e
						benefícios
						auferidos pelo público-alvo e impactos mais imediatos constatados na realidade alvo da
						intervenção. Descrever as mudanças pretendidas mais imediatas).
					</strong>
					<strong>Até 3000 caracteres. </strong>
					<div class="qtd_caracteres">
						<strong>
							<p><small class="caracteres_result"></small></p>
						</strong>
						<textarea class="form-control class_textarea" id="result" rows="3" name="result"></textarea>
					</div>
					<!-- Final dos Inputs -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_resultados_previous"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_resultados_next" id="btn_resultados_next"
							class="btn btn-success btn-lg" data-url="{{route('save.institution')}}"
							welcome="{{route('login.institution')}}">Salvar
							Informações</button>
					</div>
					<br />
				</div>
			</div>
		</div>
	</div>
</form>

{{-- Modal para carregar messagem ao salvar Institução --}}
<div class="modal" tabindex="-1" role="dialog" id="loadSaveInstitution">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Título do modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h1>Aguarde...</h1>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

@endsection