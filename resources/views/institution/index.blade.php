@extends('layouts.site')

@section('title', 'Intentificação da empresa')

@section('content')

<h1>Cadastro da Instituição</h1>

<!-- Menu de cadastro da instituição -->
<form method="post" id="register_form" action="{{route('save.institution')}}" novalidate>
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
	<!-- Campos de texto para descrever a instituição -->
	<div class="tab-content" style="margin-top:16px; ">
		<div class="tab-pane active" id="instituicao_detalhes">
			<div class="panel panel-default">
				<div class="panel-heading"><strong> IDENTIFICAÇÃO DA INSTITUIÇÃO</strong></div>
				<div class="panel-body">
					<!-- Inicio dos Inputs da Instituição-->
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="name">Nome da Instituição proponente: </label>
							<input type="text" class="form-control" name="name" id="name"
								placeholder="Nome da Instituição proponente:" value="">
						</div>
						<div class="col-md-4 mb-3">
							<label for="fantasy_name">Nome para certificação (nome fantasia): </label>
							<input type="text" class="form-control" id="fantasy_name"
								placeholder="Nome para certificação (nome fantasia):" value="" name="fantasy_name">
						</div>
						<div class="col-md-4 mb-3">
							<label for="activity_branch">Ramo de atividade:</label>
							<input type="text" class="form-control" id="activity_branch"
								placeholder="Ramo de atividade:" value="" name="activity_branch">
						</div>
						<div class="col-md-4 mb-3">
							<label for="cnpj">CNPJ:</label>
							<input type="text" class="form-control" id="cnpj" placeholder="Informe apenas números" value=""
								name="cnpj">
						</div>
						<div class="col-md-4 mb-3">
							<label for="county">Município:</label>
							<select class="form-control form-control-sm" name="county">
								<option></option>
								<option>Camaçari</option>
								<option>Candeias</option>
								<option>Lauro de Freitas</option>
								<option>Salvador</option>
								<option>Simões Filho</option>
							</select>
						</div>
						<div class="col-md-4 mb-3">
							<label for="uf">UF:</label>
							<input type="text" class="form-control" id="uf" value="BA" name="uf" readonly="readonly">
						</div>
						<div class="col-md-4 mb-3">
							<label for="address">Endereço:</label>
							<input type="text" class="form-control" id="address" placeholder="Endereço:" value=""
								name="address">
						</div>
						<div class="col-md-4 mb-3">
							<label for="email">E-mail:</label>
							<input type="email" class="form-control" id="email" placeholder="E-mail" value=""
								name="email">
						</div>
						<div class="col-md-4 mb-3">
							<label for="phone">Telefone:</label>
							<input type="text" class="form-control" id="phone" placeholder="Telefone" value=""
								name="phone">
						</div>
						<div class="col-md-4 mb-3">
							<label for="technical_manager">Responsável técnico:</label>
							<input type="text" class="form-control" id="technical_manager"
								placeholder="Responsável técnico:" value="" name="technical_manager">
						</div>
						<div class="col-md-4 mb-3">
							<label for="formation">Formação:</label>
							<input type="text" class="form-control" id="formation" placeholder="Formação:" value=""
								name="formation">
						</div>
						<div class="col-md-4 mb-3">
							<label for="phone_two">Telefone:</label>
							<input type="text" class="form-control" id="phone_two" placeholder="Telefone:" value=""
								name="phone_two">
						</div>
						<div class="col-md-6 mb-3">
							<label for="email_two">E-mail:</label>
							<input type="text" class="form-control" id="email_two" placeholder="E-mail " value=""
								name="email_two">
						</div>
						<div class="col-md-6 mb-3">
							<label for="email_two">Classificação da Empressa</label>
							<select class="form-control form-control-sm" id="company_classification" name="company_classification">
								<option></option>
								<option>Micro(5 a 9 funcionários)</option>
								<option>Pequena(10 a 12 funcionários)</option>
								<option>Pequena(13 a 49 funcionários)</option>
								<option>Média(50 a 99 funcionários)</option>
								<option>Grande(+ de 100 funcionários)</option>
								<option>ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIRAÇÃO DA DIVERSIDADE?</option>
							</select>
						</div>
						<!-- Menbros da comiisão -->
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
										<th scope="col">Nome do funcionário</th>
										<th scope="col">Função / setor</th>
										<th scope="col">Telefone</th>
										<th scope="col">E-mail</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" class="form-control" id="members_name"
												placeholder="Nome" value="" name="members_name[]">
										</td>
										<td>
											<input type="text" class="form-control" id="members_function"
												placeholder="Função / setor" value="" name="members_function[]">
										</td>
										<td>
											<input type="text" class="form-control" id="phone_members_commission"
												placeholder="Telefone" value="" name="phone_members_commission[]">
										</td>
										<td>
											<input type="email" class="form-control" id="members_email"
												placeholder="E-mail" value="" name="members_email[]">
										</td>
									</tr>
								</tbody>
							</table>
							<!-- CNPJ Adicionias. Estes campos são opcionais -->
							<!-- <label>CNPJ Adicionais</label> -->
							<table class="table " id="tblCNPJsAdicionais">
								<thead>
									<tr>
										<th scope="col"> <button onclick="AddTableRow()" type="button"
												class="btn btn-success">Adicionar mais CNPJs </button></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="col" width="950px">
											&nbsp;
											<label>CNPJs   Acicionais</label>
											<input type="text" class="form-control" id="cnpj_additional"
												placeholder="Informe apenas números" name="cnpj_additional[]">
										</td>
										<th>
											&nbsp;
											<label>Excluir</label><br>
											<button onclick="RemoveTableRow(this)" type="button"
												class="btn btn-danger">Remover Linha</button>
										</th>
									</tr>

								</tbody>
							</table>
						</div>
						<br />
						<div align="center">
							<button type="button" name="btn_indentificacao" id="btn_indentificacao"
								class="btn btn-info btn-lg">Proximo</button>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o Diagnóstico Censitário -->
		<div class="tab-pane fade" id="diagnostico_censitario">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>QUESTIONÁRIO PARA DIAGNÓSTICO CENSITÁRIO</strong></div>
				<div class="panel-body">
					<!-- Inicio das Questões -->
					@foreach ($questionAlternatives as $question)

					<p><strong>{{ $question->name }}</strong></p>

					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="">Resposta</label>
							<select class="form-control form-control-sm" name="alternative_id[]">
								<option value=""></option>
								@foreach ($question->alternatives as $alternativa)
								<option value="{{$alternativa->id}}">{{ $alternativa->alternative }}</option>
								@endforeach
							</select>
							@if($question->field_option=="SIM")
							<label for="">Se sim, quais?</label>
							<input type="text" class="form-control" name="others[]">
							@endif
						</div>

					</div>
					@endforeach
					{{-- Tabelas perfil colaborador --}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<h4><strong>Nivel de atividade dos colaboradores: Demais grupos étnicos-raciais</strong>
							</h4>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">NIVEL DE ATIVIDADE</th>
										<th scope="col">RAÇA/COR</th>
										<th scope="col">Nº HOMEMS</th>
										<th scope="col">Nº MULHERES</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Operacional" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Demais grupos étnicos-raciais" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value="" name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value="" name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Supervisão" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Demais grupos étnicos-raciais" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value="" name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value="" name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Gerência / Chefia" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Demais grupos étnicos-raciais" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value="" name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value="" name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Direção" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color[]"
												value="Demais grupos étnicos-raciais" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value="" name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value="" name="woman_quantity_activity_level[]">
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<div class="form-group col-md-6">
							<h4><strong>Nivel de atividade dos colaboradores: Negros (pretos + pardos)</strong></h4>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">NIVEL DE ATIVIDADE</th>
										<th scope="col">RAÇA/COR</th>
										<th scope="col">Nº HOMEMS</th>
										<th scope="col">Nº MULHERES</th>
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
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value=""  name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value=""  name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Supervisão" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value=""  name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value=""  name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Gerência / Chefia" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value=""  name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value=""  name="woman_quantity_activity_level[]">
										</td>
									</tr>
									<tr>
										<th width="160px;">
											<input type="text" class="form-control" id="activity_level"
												value="Direção" readonly="readonly" name="activity_level[]">
										</th>
										<th>
											<input type="text" class="form-control" id="color"
												value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
										</th>
										<td width="20px;">
											<input type="text" class="form-control" id="human_quantity_activity_level"
												value=""  name="human_quantity_activity_level[]">
										</td>
										<td width="20px;">
											<input type="text" class="form-control" id="woman_quantity_activity_level"
												 value=""  name="woman_quantity_activity_level[]">
										</td>
									</tr>
								
								</tbody>
							</table>
						</div>
					</div>
					{{-- perfil dos colaboradores  --}}
					<div class="form-group col-md-12">

						<h4><strong>Perfil étnico racial dos colaboradores</strong></h4>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">RAÇA/COR</th>
									<th scope="col">Nº HOMEMS</th>
									<th scope="col">Nº MULHERES</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>
										<input type="text" class="form-control" id="color"
											value="Negros (pretos + pardos)" readonly="readonly" name="color[]">
									</th>
									<td width="20px;">
										<input type="text" class="form-control" id="human_quantity"
											 value="" name="human_quantity[]">
									</td>
									<td width="20px;">
										<input type="text" class="form-control" id="woman_quantity"
										 value="" name="woman_quantity[]" >
									</td>
								</tr>
								<tr>
									<th>
										<input type="text" class="form-control" id="color"
											value="Demais grupos étnicos-raciais" readonly="readonly" name="color[]">
									</th>
									<td width="20px;">
										<input type="text" class="form-control" id="human_quantity"
											 value="" name="human_quantity[]">
									</td>
									<td width="20px;">
										<input type="text" class="form-control" id="woman_quantity"
										 value="" name="woman_quantity[]" >
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
							class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o plano de trabalho étnico racial -->
		<div class="tab-pane fade" id="plano_trabalho">
			<div class="panel panel-default">
				<div class="panel-heading">PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL APRESENTAÇÃO.</div>
				<div class="panel-body">
					<!-- Inicio do plano de trabalho -->
					<div class="form-textarea">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Explicar brevemente do que trata o plano de
								trabalho, apresentar a organização e mencionar se já está sendo desenvolvido e os
								principais resultados alcançados.</label><br />
							<strong>Até 3000 caracteres. </strong>
							<div class="qtd_caracteres">
								<strong>
									Tamanho: 3000
								</strong>
							</div>
							<textarea class="form-control class_textarea" id="action_plan"
								rows="3" name="action_plan"></textarea>
						</div>
					</div>
					<!-- Final do plano de trabalho -->
					<br />
					<div align="center">
						<button type="button" name="previous_btn_personal_details" id="btn_previous_plano_trabalho"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_instituicacao_next" id="btn_plano_trabalho_next"
							class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o cronograma -->
		<div class="tab-pane fade" id="cronograma">
			<div class="panel panel-default">
				<div class="panel-heading">CRONOGRAMA</div>
				<div class="panel-body">
					<!-- Inicio do cronograma -->
					<h4>Cronograma (Data limite de entrega das atividades será <strong> 30/11/2019)</strong></h4>
					<h4>Listar todas as atividades necessárias à realização do projeto.</h4>
					<label>
						Autoriza a divulgação destas ações pela SEMUR?
						<select class="form-control-sm">
							<option></option>
							<option>SIM</option>
							<option>NÃO</option>
						</select>
					</label>
					<table class="table table-bordered" id="tbl_schedules">
						<thead>
							<tr>
								<th scope="col"> <button onclick="AddTableRowSchedule()" type="button"
										class="btn btn-success">Adicionar Linhas na Tabela </button></th>
							</tr>
							<tr>
								<th scope="col">AÇÕES</th>
								<th scope="col">ATIVIDADE(O que é necessário fazer para atingir este objetivo)</th>
								<th scope="col">QUANTIDADE</th>
								<th scope="col">DATA LIMITE</th>
								<th scope="col">REMOVER</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td width="300px;">
									<select class="form-control form-control-sm" id="action" name="action[]">
										<option></option>
										@foreach ($actions as $item)
										<option>{{ $item->description}}</option>
										@endforeach
									</select>
								</td>
								<td>
									<textarea id="activity" class="form-control" name="activity[]"></textarea>
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
						<button type="button" name="btn_plano_next" id="btn_plano_next"
							class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever as parceiras -->
		<div class="tab-pane fade" id="parceiras">
			<div class="panel panel-default">
				<div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
				<div class="panel-body">
					<!-- Inicio dos inpust -->
					<h4>PARCEIRAS</h4>
					<strong>
						(Descrever as parcerias propostas e potenciais, enumerando os parceiros e suas respectivas
						responsabilidades/competências - o que caberá a cada um e/ou áreas das organizações envolvidas -
						bem como a natureza das contrapartidas e valor em reais – R$ se houver.)
					</strong>
					<strong>Até 2000 caracteres. </strong>
					<div class="qtd_caracteres">
						<strong>
							Tamanho: 2000
						</strong>
						<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3" name="partners"></textarea>
					</div>
					<!-- Final dos inputs -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_previous_parceiras"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_next_parceiras" id="btn_next_parceiras"
							class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o METODOLOGIA -->
		<div class="tab-pane fade" id="metodologia">
			<div class="panel panel-default">
				<div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
				<div class="panel-body">
					<!-- Incio dos Inputs -->
					<h4>METODOLOGIA</h4>
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
							Tamanho: 7000
						</strong>
						<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3" name="methodology"></textarea>
					</div>
					<!-- Final dos Inpust -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_metodologia_previous"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_contact_details" id="btn_metodologia_next"
							class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!--  Campos de texto para descrever resultados esperados -->
		<div class="tab-pane fade" id="resultados_esperados">
			<div class="panel panel-default">
				<div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
				<div class="panel-body">
					<!-- Inicio dos inputs -->
					<h4>RESULTADOS ESPERADOS</h4>
					<strong>
						(Enumerar os resultados esperados após a execução do projeto. Explicitar os ganhos e benefícios
						auferidos pelo público-alvo e impactos mais imediatos constatados na realidade alvo da
						intervenção. Descrever as mudanças pretendidas mais imediatas).
					</strong>
					<strong>Até 3000 caracteres. </strong>
					<div class="qtd_caracteres">
						<strong>
							Tamanho: 3000
						</strong>
						<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3" name="result"></textarea>
					</div>
					<!-- Final dos Inputs -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_resultados_previous"
							class="btn btn-default btn-lg">Anterior</button>
						<button type="submit" name="btn_resultados_next" id="btn_resultados_next"
							class="btn btn-success btn-lg">Salvar Informações</button>
					</div>
					<br />
				</div>
			</div>
		</div>
	</div>
</form>

@endsection