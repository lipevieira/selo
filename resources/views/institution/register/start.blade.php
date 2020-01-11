@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}
<link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">
@yield('css')
@stop

@section('body_class')

@section('body')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Selo da Diversidade Étnico-Racial</h1>
        <p class="lead">Antes de começar o seu cadastro vamos a algumas perguntas basicas.</p>
        <hr class="my-4">
        <form method="GET" action="{{route('index.company')}}">
            <div class="form-group">
                <label for="cb_company">Indentificação da Empresa/Instituição</label>
                <select class="form-control form-control-sm" id="cb_type_institution" name="cb_type_institution">
                    <option></option>
                    @foreach ($companyClassifications as $item)
                    <option value="{{$item->id}}">{{$item->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="etapa01">
                <label for="cb_company_etapa01">PROPRIETÁRIO OU ADMINISTRADOR NEGRO?</label>
                <select class="form-control form-control-sm" id="cb_company_01">
                    <option>click aqui para começar a responder</option>
                    <option>SIM</option>
                    <option>NÃO</option>
                </select>
            </div>
            <div class="form-group" id="etapa02">
                <label for="cb_company_02">MAIORIA DOS FUNCIONÁRIOS NEGROS?</label>
                <select class="form-control form-control-sm" id="cb_company_02" data-url="{{route('index.company')}}">
                    <option>click aqui para começar a responder</option>
                    <option>SIM</option>
                    <option>NÃO</option>
                </select>
            </div>
            <div class="form-group" id="etapa03">
                <label for="cb_company_etapa03">ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIZAÇÃO DA
                    DIVERSIDADE?</label>
                <select class="form-control form-control-sm" id="institution_entity" name="institution_entity">
                    <option>click aqui para começar a responder</option>
                    <option>SIM</option>
                    <option>NÃO</option>
                </select>
            </div>
            <br /><br />
            <div id="foot-register-button">
                <button type="submit" id="btn_star_register" class="btn btn-primary btn-lg">
                    Iniciar Cadastro
                </button>
            </div>
        </form>
    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{ asset('assets/start/start.js') }}"></script>
@stop