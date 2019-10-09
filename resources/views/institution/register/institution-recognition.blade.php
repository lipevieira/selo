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
                    <strong> IDENTIFICAÇÃO DA INSTITUIÇÃO</strong>
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
                    <form action="{{route('save.institution.recognition')}}" method="POST">
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
                                <label for="email_two">Classificação da Empresa <small
                                        class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" id="company_classification"
                                    name="company_classification">
                                    <option value="{{$type_institution}}">{{$type_institution}}</option>

                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cnpj">CNPJ <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="cnpj" placeholder="Informe apenas números"
                                    value="" name="cnpj">
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
                                <input type="text" class="form-control" id="uf" value="BA" name="uf"
                                    readonly="readonly">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address">Endereço <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="address" placeholder="Endereço:" value=""
                                    name="address">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email">E-mail:<small class="asterisco-input">(Deve ser usado como seu Login)*</small></label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail" value=""
                                    name="email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone">Telefone <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="phone" placeholder="Telefone" value=""
                                    name="phone">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="technical_manager">Responsável técnico <small
                                        class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="technical_manager"
                                    placeholder="Responsável técnico:" value="" name="technical_manager">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="formation">Formação <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="formation" placeholder="Formação:" value=""
                                    name="formation">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone_two">Telefone</label>
                                <input type="text" class="form-control" id="phone_two" placeholder="Telefone:" value=""
                                    name="phone_two">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email_two">Ramo de Atividade <small
                                        class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="institution_activity">
                                    <option></option>
                                    <option value="Indústria">Indústria</option>
                                    <option value="Comércio">Comércio</option>
                                    <option value="Serviços">Serviços</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <br>
                                <button type="submit" class="btn btn-primary btn-sm">Salvar Instituição</button>
                            </div>
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