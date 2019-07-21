@extends('layouts.site')

@section('title', 'Intentificação da empresa')

@section('content')

<h1>Cadastro da Instituição</h1>

<!-- Menu de cadastro da instituição -->
<form method="post" id="register_form">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_instituicao_detalhes">Indentificação da Instituição</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_diagnostico_censitario" style="border:1px solid #ccc">Diagnóstico Censitário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_plano_trabalho_etnico" style="border:1px solid #ccc">Plano de Trabalho</a>
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
			<a class="nav-link inactive_tab1" id="list_resultados_esperados" style="border:1px solid #ccc">Resultados Esperados</a>
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
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<div class="col-md-12 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						</div>
						<!-- Menbros da comiisão -->
						<h5 class="col-md-12 mb-3"> <strong> Recomendamos eleger três colaboradores para tratar da questão diversidade na empresa. Eles serão os contatos entre empresa e Comitê Gestor. Para melhor andamento do trabalho é indicado, preferencialmente, funcionários dos setores de Marketing e gestão de pessoas, e pelo menos um, estar ocupando um cargo de decisão.
						</strong></h5>
						<div class="col-md-12 mb-3">
							<table class="table  table-bordered">
								<thead>
									<tr>
										<th scope="col">First</th>
										<th scope="col">Last</th>
										<th scope="col">Handle</th>
										<th scope="col">Handle</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
									<tr>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>	
									<tr>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
								</tbody>
							</table>
							<!-- CNPJ Adicionias. Estes campos são opcionais -->
							<!-- <label>CNPJ Adicionais</label> -->
							<table class="table " id="tblCNPJsAdicionais">
								<thead>
									<tr>
										<th scope="col"> <button onclick="AddTableRow()" type="button" class="btn btn-success">Adicionar mais CNPJs </button></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="col" width="950px">
											&nbsp;
											<label>CNPJs Acicionais</label>
											<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="">
										</th>
										<th>
											&nbsp;
											<label>Excluir</label><br>
											<button onclick="RemoveTableRow(this)" type="button" class="btn btn-danger">Remover Linha</button>
										</th>
									</tr>
									
								</tbody>
							</table>
						</div>
						<br />
						<div align="center">
							<button type="button" name="btn_indentificacao" id="btn_indentificacao" class="btn btn-info btn-lg">Proximo</button>
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
								<select class="form-control form-control-sm">
									<option value=""></option>
									@foreach ($question->alternatives as $alternativa)				
										<option>{{ $alternativa->alternative }}</option>
									@endforeach
								</select>
								@if($question->field_option=="SIM")
									<label for="">Se sim, quais?</label>
									<input type="text" class="form-control">
								@endif
							</div>
							
						</div>
					@endforeach
					{{-- Tabelas perfil colaborador --}}
					<div class="form-row">
						<div class="form-group col-md-6">
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
											<input type="text" class="form-control" id="validationCustom01" value="Negros (pretos + pardos)" readonly="readonly">
										</th>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
									<tr>
										<th>
											<input type="text" class="form-control" id="validationCustom01" value="Demais grupos étinicos-raciais" readonly="readonly">
										</th>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-group col-md-6">
							<h4><strong>Nivel de atividade dos colaboradores</strong></h4>
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
											<input type="text" class="form-control" id="validationCustom01" value="Operacional" readonly="readonly">
										</th>
										<th>
											<select class="form-control form-control-sm">
												<option value=""></option>				
												<option>Negros (pretos + pardos)</option>
												<option>Demais grupos étinicos-raciais</option>
											</select>
										</th>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" value="Mark" required>
										</td>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="" required>
										</td>
									
									</tr>
									<tr>
										<th>
											<input type="text" class="form-control" id="validationCustom01" value="Supervião" readonly="readonly">
										</th>
										<th>
											<select class="form-control form-control-sm">
												<option value=""></option>				
												<option>Negros (pretos + pardos)</option>
												<option>Demais grupos étinicos-raciais</option>
											</select>
										</th>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
									<tr>
										<th>
											<input type="text" class="form-control" id="validationCustom01" value="Gerência/Chefia" readonly="readonly">
										</th>
										<th>
											<select class="form-control form-control-sm">
												<option value=""></option>				
												<option>Negros (pretos + pardos)</option>
												<option>Demais grupos étinicos-raciais</option>
											</select>
										</th>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
									<tr>
										<th>
											<input type="text" class="form-control" id="validationCustom01" value="Direção" readonly="readonly">
										</th>
										<th>
											<select class="form-control form-control-sm">
												<option value=""></option>				
												<option>Negros (pretos + pardos)</option>
												<option>Demais grupos étinicos-raciais</option>
											</select>
										</th>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
										<td width="20px;">
											<input type="number" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
										
					<!-- Final das questões -->
					<br /><br /><br /><br /><br />
					<div align="center">
						<button type="button" name="btn_previous_diagnostico" id="btn_previous_diagnostico" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_diagnostico_next" id="btn_diagnostico_next" class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o plano de trabalho étnico racial -->
		<div class="tab-pane fade" id="plano_trabalho">
			<div class="panel panel-default">
				<div class="panel-heading">PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL	 APRESENTAÇÃO.</div>
				<div class="panel-body">
					<!-- Inicio do plano de trabalho -->
					<div class="form-textarea">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Explicar brevemente do que trata o plano de trabalho, apresentar a organização e mencionar se já está 	sendo desenvolvido e os principais resultados alcançados.</label><br/>
							<strong>Até 3000 caracteres.	</strong>     
							<div class="qtd_caracteres" >
								<strong >
									Tamanho: 3000
								</strong>
							</div>
							<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"></textarea>
						</div>
					</div>
					<!-- Final do plano de trabalho -->
					<br />
					<div align="center">
						<button type="button" name="previous_btn_personal_details" id="btn_previous_plano_trabalho" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_instituicacao_next" id="btn_plano_trabalho_next" class="btn btn-info btn-lg">Proximo</button>
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
							<option>SIM</option>
							<option>NÃO</option>
						</select>
					</label>
					<table class="table table-bordered" id="tbl_schedules">
						<thead>
							<tr>
								<th scope="col"> <button onclick="AddTableRowSchedule()" type="button" class="btn btn-success">Adicionar  Linhas na tabela </button></th>
							</tr>
							<tr>
								<th scope="col">AÇÕES</th>
								<th scope="col">ATIVIDADE(O que é necessário fazer para atingir este objetivo)</th>
								<th scope="col">QUANTIDADE</th>
								<!-- <th scope="col">STATUS</th> -->
								<th scope="col">DATA LIMITE</th>
								<th scope="col">REMOVER</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td width="200px;">
									<select class="form-control form-control-sm">
										<option>Essa função deve estar com o formato de funções do jQuery, para que seja possível utilizarmos as funções dele.</option>
										<option>Ação 02</option>
										<option>Ação 03</option>
									</select>
								</td>
								<td>
									<textarea name="address" id="address" class="form-control"></textarea>
								</td>
								<td width="30px;">
									<select class="form-control form-control-sm">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
									</select>
								</td>
								<!-- <td>
									<select class="form-control form-control-sm">
										<option>Não</option>
									</select>
								</td> -->
								<td>
									<input type="date" class="form-control" id="validationCustom01"  value="" >
								</td>
								<td>
									<button onclick="RemoveTableRow(this)" type="button" class="btn btn-danger">Remover Linha</button>
								</td>
							</tr>

						</tbody>
					</table>
					<!-- Final do cronograma -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_cronograma" id="btn_previous_cronograma" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_plano_next" id="btn_plano_next" class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever as parceiras -->
		<div class="tab-pane fade" id="parceiras">
			<div class="panel panel-default">
				<div class="panel-heading">	PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
				<div class="panel-body">
					<!-- Inicio dos inpust -->
					<h4>PARCEIRAS</h4>
					<strong>
						(Descrever as parcerias propostas e potenciais, enumerando os parceiros e suas respectivas responsabilidades/competências - o que caberá a cada um e/ou áreas das organizações envolvidas - bem como a natureza das contrapartidas e valor em reais – R$ se houver.)	
					</strong>
					<strong>Até 2000 caracteres.	</strong>     
					<div class="qtd_caracteres" >
						<strong >
							Tamanho: 2000
						</strong>
						<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"></textarea>
					</div>
					<!-- Final dos inputs -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_previous_parceiras" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_next_parceiras" id="btn_next_parceiras"  class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o METODOLOGIA -->
		<div class="tab-pane fade" id="metodologia">
			<div class="panel panel-default">
				<div class="panel-heading">	PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
				<div class="panel-body">
					<!-- Incio dos Inputs -->
					<h4>METODOLOGIA</h4>
					<strong>
						(Descrever as estratégias a serem utilizadas na intervenção, as etapas do trabalho a serem desenvolvidas, os instrumentos, técnicas previstas e registros de sistematização a ser utilizado, justificando e fundamentado a escolha adotada. Deve haver compatibilidade entre o público alvo do projeto - características do grupo - e a metodologia adotada, indicando o potencial do projeto para a sustentabilidade, para o desenvolvimento de lideranças e para a participação efetiva da comunidade no processo. O enfoque deve basear-se em metodologia participativa, envolvendo a comunidade alvo, se couber).						
					</strong>
					<strong>Até 7000 caracteres.	</strong>     
					<div class="qtd_caracteres" >
						<strong >
							Tamanho: 7000
						</strong>
						<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"></textarea>
					</div>
					<!-- Final dos Inpust -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_metodologia_previous" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_contact_details" id="btn_metodologia_next"  class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!--  Campos de texto para descrever resultados esperados -->
		<div class="tab-pane fade" id="resultados_esperados">
			<div class="panel panel-default">
				<div class="panel-heading">	PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
				<div class="panel-body">
					<!-- Inicio dos inputs -->
					<h4>RESULTADOS ESPERADOS</h4>
					<strong>
						(Enumerar os resultados esperados após a execução do projeto. Explicitar os ganhos e benefícios auferidos pelo público-alvo e impactos mais imediatos constatados na realidade alvo da intervenção. Descrever as mudanças pretendidas mais imediatas).	
					</strong>
					<strong>Até 3000 caracteres.	</strong>     
					<div class="qtd_caracteres" >
						<strong >
							Tamanho: 3000
						</strong>
						<textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"></textarea>
					</div>
					<!-- Final dos Inputs -->
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_resultados_previous" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_resultados_next" id="btn_resultados_next" class="btn btn-success btn-lg">Salvar Informações</button>
					</div>
					<br />
				</div>
			</div>
		</div>
	</div>
</form>

@endsection