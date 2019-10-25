@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">
@yield('css')
@stop

@section('body_class')

@section('body')
<div class="container">
    <div class="tab-content" style="margin-top:16px; ">
        <div class="tab-pane active" id="instituicao_detalhes">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="text-align: center">
                        <strong> IDENTIFICAÇÃO DA INSTITUIÇÃO RECONHECIMENTO</strong>
                    </div>
                    <div class="legends-forms">
                        <strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
                            class="asterisco-input-ogrigatorio">*</small>
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
                    {{-- Messagem de sucesso caso tenha salvado --}}
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
                    <form action="{{route('save.institution.recognition')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name">Nome da Instituição proponente <small
                                        class="asterisco-input">*</small>
                                </label>
                                <input type="text" class="form-control " name="name" id="name"
                                    placeholder="Nome da Instituição proponente:" value="{{old('name')}}">
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="fantasy_name">Nome para certificação (nome fantasia) <small
                                        class="asterisco-input">*</small> </label>
                                <input type="text" class="form-control" id="fantasy_name"
                                    placeholder="Nome para certificação (nome fantasia):"
                                    value="{{old('fantasy_name')}}" name="fantasy_name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email_two">Classificação da Empresa</label>
                                <select class="form-control form-control-sm" id="company_classification"
                                    name="company_classification">
                                    @foreach ($companyClassifications as $item)
                                    @if ($item->id == $type_institution)
                                    <option value="{{$item->id}}">{{$item->type}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cnpj">CNPJ <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="cnpj" placeholder="Informe apenas números"
                                    value="{{ old('cnpj') }}" name="cnpj">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="county">Município <small class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="county">
                                    <option></option>
                                    <option value="Camaçari" @if (old('county')=="Camaçari" ) {{ 'selected' }} @endif>
                                        Camaçari</option>
                                    <option value="Candeias" @if (old('county')=="Candeias" ) {{ 'selected' }} @endif>
                                        Candeias
                                    </option>
                                    <option value="Lauro de Freitas" @if (old('county')=="Lauro de Freitas" )
                                        {{ 'selected' }} @endif>Lauro de Freitas</option>
                                    <option value="Salvador" @if (old('county')=="Salvador" ) {{ 'selected' }} @endif>
                                        Salvador</option>
                                    <option value="Simões Filho" value="Candeias" @if (old('county')=="Simões Filho" )
                                        {{ 'selected' }} @endif>Simões Filho</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="uf">UF:</label>
                                <input type="text" class="form-control" id="uf" value="BA" name="uf"
                                    readonly="readonly">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address">Endereço <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="address" placeholder="Endereço:"
                                    value="{{ old('address') }}" name="address">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email">E-mail:<small class="asterisco-input">*</small></label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail"
                                    value="{{ old('email') }}" name="email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone">Telefone <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="phone" placeholder="Telefone"
                                    value="{{ old('phone') }}" name="phone">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="technical_manager">Responsável técnico <small
                                        class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="technical_manager"
                                    placeholder="Responsável técnico:" value="{{ old('technical_manager') }}"
                                    name="technical_manager">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="formation">Formação <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="formation" placeholder="Formação:"
                                    value="{{ old('formation') }}" name="formation">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone_two">Telefone</label>
                                <input type="text" class="form-control" id="phone_two" placeholder="Telefone:"
                                    value="{{ old('phone_two') }}" name="phone_two">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email_two">Ramo de Atividade <small
                                        class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="institution_activity">
                                    <option></option>
                                    <option value="Indústria" @if (old('institution_activity')=="Indústria" )
                                        {{ 'selected' }} @endif>Indústria</option>

                                    <option value="Comércio" @if (old('institution_activity')=="Comércio" )
                                        {{ 'selected' }} @endif>Comércio</option>

                                    <option value="Serviços" @if (old('institution_activity')=="Serviços" )
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
                                    role="button">Click aqui para baixar o Anexo</a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><strong> Para receber o selo reconhecimento é necessário Imprimir, preencher, assinar
                                        e anexar arquivo no botao acima</strong></p>
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <br><br><br>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar Instituição</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('adminlte_js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/institution/mask.js') }}"></script>

    @stop