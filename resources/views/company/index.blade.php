@extends('layouts.site')

@section('title', 'Intentificação da empresa')

@section('content')

<h1>Cadastro da Instituição</h1>

<!-- Menu de cadastro da instituição -->
<form method="post" id="register_form">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Indentificação da Instituição</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Diagnóstico Censitário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Plano de Trabalho</a>
		</li>
		<!-- Segunda parte do menu -->
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_plano_trabalho_etnico" style="border:1px solid #ccc">Contact Details</a>
		</li>
<!-- 		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact Details</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact Details</a>
		</li>
		<li class="nav-item">
			<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact Details</a>
		</li> -->
	</ul>
	<!-- Formulario da instituição -->
	<div class="tab-content" style="margin-top:16px;">
		<div class="tab-pane active" id="login_details">
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
		<!-- Formulario do Diagnóstico Censitário -->
		<div class="tab-pane fade" id="personal_details">
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
		<!-- Formulario do plano de trabalho étnico racial -->
		<div class="tab-pane fade" id="plano_trabalho">
			<div class="panel panel-default">
				<div class="panel-heading">Plano de trabalho étnico racial</div>
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
						<button type="button" name="previous_btn_personal_details" id="btn_previous_plano_trabalho" class="btn btn-default btn-lg">Anterior</button>
						<button type="button" name="btn_instituicacao_next" id="btn_plano_trabalho_next" class="btn btn-info btn-lg">Proximo</button>
					</div>
					<br />
				</div>
			</div>
		</div>


		<!-- Final do formulario -->
		<div class="tab-pane fade" id="contact_details">
			<div class="panel panel-default">
				<div class="panel-heading">Fill Contact Details</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Enter Address</label>
						<textarea name="address" id="address" class="form-control"></textarea>
						<span id="error_address" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label>Enter Mobile No.</label>
						<input type="text" name="mobile_no" id="mobile_no" class="form-control" />
						<span id="error_mobile_no" class="text-danger"></span>
					</div>
					<br />
					<div align="center">
						<button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
						<button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
					</div>
					<br />
				</div>
			</div>
		</div>
	</div>
</form>

@endsection