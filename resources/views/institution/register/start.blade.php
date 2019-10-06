@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}
<link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="container-company">
            <div class="logo">
                <img src="{{asset('images/selo_horizontal.jpg')}}" width="700" height="200"
                    class="d-inline-block align-top" alt="">
            </div>
            <h3>Antes de começar o seu cadastro vamos a algumas perguntas basicas.</h3>
            <form>
                <div class="form-group">
                    <label for="cb_company">Indentificação da Empresa</label>
                    <select class="form-control form-control-sm" id="cb_company" data-url="{{route('index.company')}}">
                        <option></option>
                        <option>Micro(5 a 9 funcionários)</option>
                        <option>Pequena(10 a 12 funcionários)</option>
                        <option>Pequena(13 a 49 funcionários)</option>
                        <option>Média(50 a 99 funcionários)</option>
                        <option>Grande(+ de 100 funcionários)</option>
                        <option>ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIRAÇÃO DA DIVERSIDADE?</option>
                    </select>
                </div>
                <div class="form-group" id="etapa01">
                    <label for="cb_company_etapa01">PROPRIETÁRIO OU ADMINISTRADOR NEGRO?</label>
                    <select class="form-control form-control-sm" id="cb_company_01">
                        <option></option>
                        <option>SIM</option>
                        <option>NÃO</option>
                    </select>
                </div>
                <div class="form-group" id="etapa02">
                    <label for="cb_company_etapa02">MAIORIA DOS FUNCIONÁRIOS NEGROS?</label>
                    <select class="form-control form-control-sm" id="cb_company_02"
                        data-url="{{route('index.company')}}">
                        <option></option>
                        <option>SIM</option>
                        <option>NÃO</option>
                    </select>
                </div>
                <div class="form-group" id="etapa03">
                    <label for="cb_company_etapa03">ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIZAÇÃO DA
                        DIVERSIDADE?</label>
                    <select class="form-control form-control-sm" id="cb_company_03"
                        data-url="{{route('index.company')}}">
                        <option></option>
                        <option>SIM</option>
                        <option>NÃO</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{ asset('assets/institution/register/script.js') }}"></script>
@stop