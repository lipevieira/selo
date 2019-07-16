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
	<div class="tab-content" style="margin-top:16px;">
		<div class="tab-pane active" id="instituicao_detalhes">
			<div class="panel panel-default">
				<div class="panel-heading">Indentificação da Instituição</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Enter Email Address</label>
						<input type="text" name="email" id="email" class="form-control" />
						<span id="error_email" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>Enter Password</label>
						<input type="password" name="password" id="password" class="form-control" />
						<span id="error_password" class="text-danger"></span>
					</div>
					<br />
					<div align="center">
						<button type="button" name="btn_indentificacao" id="btn_indentificacao" class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>
		<!-- Campos de texto para descrever o Diagnóstico Censitário -->
		<div class="tab-pane fade" id="diagnostico_censitario">
			<div class="panel panel-default">
				<div class="panel-heading">Diagnóstico Censitário</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Enter First Name</label>
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