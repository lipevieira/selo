@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">
@yield('css')
@stop

@section('body_class')

@section('body')
<div class="container">
    <h1 style="text-align: center">Selo da Diversidade Ético-Racial</h1>
    <div class="jumbotron jumbotron-fluid" style="margin-top: 10px">
        <div class="container">
            <h1 class="display-4">Atualizar Cadastro</h1>
            <form action="{{route('show.institution.recognition')}}">
                <p><strong>Para começar infome o CNPJ da Instituição/Empresa</strong></p>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cnpj" placeholder="Digite apenas números"
                            name="cnpj" required>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    {{-- Formolario com as informações da pesquisar --}}
    @if ($institution != null)
    <div class="tab-content" style="margin-top:16px; ">
        <div class="tab-pane active" id="instituicao_detalhes">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="text-align: center">
                        <strong> INSTITUIÇÃO RECONHECIMENTO</strong>
                    </div>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('update.institution.recognition')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <input type="hidden" value="{{$institution->id}}" name="id">
                            <div class="col-md-4 mb-3">
                                <label for="name">Nome da Instituição proponente <small
                                        class="asterisco-input">*</small>
                                </label>
                                <input type="text" class="form-control " name="name" id="name"
                                    value="{{$institution->name}}">
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="fantasy_name">Nome para certificação (nome fantasia) <small
                                        class="asterisco-input">*</small> </label>
                                <input type="text" class="form-control" id="fantasy_name"
                                    value="{{$institution->fantasy_name}}" name="fantasy_name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email_two">Classificação da Empresa</label>
                                <select class="form-control form-control-sm" id="company_classification"
                                    name="company_classification">
                                    @foreach ($companyClassifications as $item)
                                    @if ($item->id == $institution->company_classification)
                                    <option value="{{$item->id}}">{{$item->type}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cnpj">CNPJ <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="cnpj" value="{{ $institution->cnpj }}"
                                    name="cnpj">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="county">Município <small class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="county">
                                    <option></option>
                                    <option value="Camaçari" @if ($institution->county =="Camaçari" ) {{ 'selected' }}
                                        @endif>
                                        Camaçari</option>
                                    <option value="Candeias" @if ($institution->county =="Candeias" ) {{ 'selected' }}
                                        @endif>
                                        Candeias
                                    </option>
                                    <option value="Lauro de Freitas" @if ($institution->county =="Lauro de Freitas" )
                                        {{ 'selected' }} @endif>Lauro de Freitas</option>
                                    <option value="Salvador" @if ($institution->county=="Salvador" ) {{ 'selected' }}
                                        @endif>
                                        Salvador</option>
                                    <option value="Simões Filho" value="Candeias" @if ($institution->county =="Simões
                                        Filho" )
                                        {{ 'selected' }} @endif>Simões Filho</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="uf">UF:</label>
                                <input type="text" class="form-control" id="uf" value="{{$institution->uf}}" name="uf"
                                    readonly="readonly">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address">Endereço <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="address" value="{{ $institution->address }}"
                                    name="address">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email">E-mail:<small class="asterisco-input">*</small></label>
                                <input type="email" class="form-control" id="email" value="{{ $institution->email }}"
                                    name="email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone">Telefone <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="phone" value="{{ $institution->phone }}"
                                    name="phone">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="technical_manager">Responsável técnico <small
                                        class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="technical_manager"
                                    value="{{ $institution->technical_manager}}" name="technical_manager">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="formation">Formação <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="formation"
                                    value="{{ $institution->formation }}" name="formation">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone_two">Telefone</label>
                                <input type="text" class="form-control" id="phone_two" placeholder="Telefone:"
                                    value="{{ $institution->phone_two }}" name="phone_two">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email_two">Ramo de Atividade <small
                                        class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="institution_activity">
                                    <option></option>
                                    <option value="Indústria" @if ($institution->institution_activity =="Indústria" )
                                        {{ 'selected' }} @endif>Indústria</option>

                                    <option value="Comércio" @if ($institution->institution_activity =="Comércio" )
                                        {{ 'selected' }} @endif>Comércio</option>

                                    <option value="Serviços" @if ($institution->institution_activity =="Serviços" )
                                        {{ 'selected' }} @endif>Serviços</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="doc_name"><small class="asterisco-input">Anexar aquivo*</small></label>
                                <input type="file" class="form-control" id="doc_name" name="doc_name"
                                    value="{{ old('doc_name') }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>preencher anexo</label>
                                <a class="btn btn-danger form-control" href="{{route('document.seve')}}"
                                    role="button">Click
                                    aqui para baixar o Anexo</a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><strong> Para receber o selo reconhecimento é necessário Imprimir, preencher, assinar
                                        e anexar arquivo no botao acima</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <br><br><br>
                            <button type="submit" class="btn btn-success btn-sm">Salvar Informações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    @stop

    @section('adminlte_js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/institution/mask.js') }}"></script>

    @stop