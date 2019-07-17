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
					
					<p>1) A organização possui uma política interna de valorização da Diversidade Étnico-Racial aprovada pela direção?</p>
					<select class="form-control form-control-sm">
						<option>Small select</option>
					</select>
					
					
					<!-- Final das questões -->
					<br />
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
				<div class="panel-heading">Plano de trabalho étnico racial</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Plano</label>
						<input type="text" name="first_name" id="first_name" class="form-control" />
						<span id="error_first_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>Enter Last Name</label>
						<input type="text" name="last_name" id="last_name" class="form-control" />
						<span id="error_last_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="male" checked> Male
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="female"> Female
						</label>
					</div>
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
					<div class="form-group">
						<label>Enter Address</label>
						<textarea name="address" id="address" class="form-control"></textarea>
						<span id="error_address" class="text-danger"></span>
					</div>
					<br />
					<div align="center">
						<button type="button" name="btn_previous_cronograma" id="btn_previous_cronograma" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_plano_next" id="btn_plano_next" class="btn btn-success btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever as parceiras -->
		<div class="tab-pane fade" id="parceiras">
			<div class="panel panel-default">
				<div class="panel-heading">PARCEIRAS</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Enter Address</label>
						<textarea name="address" id="address" class="form-control"></textarea>
						<span id="error_address" class="text-danger"></span>
					</div>
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_previous_parceiras" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_next_parceiras" id="btn_next_parceiras" class="btn btn-success btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o cronograma -->
		<div class="tab-pane fade" id="metodologia">
			<div class="panel panel-default">
				<div class="panel-heading">METODOLOGIA</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Enter Address</label>
						<textarea name="address" id="address" class="form-control"></textarea>
						<span id="error_address" class="text-danger"></span>
					</div>
					<br />
					<div align="center">
						<button type="button" name="btn_previous_parceiras" id="btn_metodologia_previous" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_contact_details" id="btn_metodologia_next" class="btn btn-success btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!--  Campos de texto para descrever resultados esperados -->
		<div class="tab-pane fade" id="resultados_esperados">
			<div class="panel panel-default">
				<div class="panel-heading">RESULTADOS ESPERADOS</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Enter Address</label>
						<textarea name="address" id="address" class="form-control"></textarea>
						<span id="error_address" class="text-danger"></span>
					</div>
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