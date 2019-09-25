@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}
<link rel="stylesheet" href="{{asset('assets/institution/register/style.css ')}}">
@yield('css')
@stop

@section('body_class')

@section('body')
<div class="container">
<div>
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <div class="logo">
                <img src="{{asset('images/selo_horizontal.jpg')}}" width="800" height="300"
                    class="d-inline-block align-top" alt="">
            </div>
            <div class="wellcome">
                <h1>Bem-Vindo ao Selo da diversidade étnico racial!</h1>
            </div>
            <div class="row">
                <div class="col-md-6 institution_auth">
                    <h1> Instituições</h1>
                    <h4>Se já é cadastrado em nosso sistema por favor, <strong> <a href="{{route('login.client')}}">click
                                aqui para fazer Login.</strong></a></p>
                    <h4>Caso contrário faça seu cadastro para participa do projeto Selo da diversidade étnico racial.</h4>
                    <a href="{{route('start.register')}}" class="btn btn-success btn-lg " role="button" aria-pressed="true">Fazer cadastro de Instituição</a>
                </div>
                <div class="col-md-6 semur_auth">
                    <h1>Semur</h1>
                    <h4>Área exclusiva para funcionário da secrétaria da reparação da reparação</h4>
                    <h4>Para fazer seu cadastrado por favor, entre em contato com o NTI (Nucléo de Tecnologia da Informação)</h4>
                    <br/>
                <a href="{{route('login')}}" class="btn btn-success btn-lg " role="button" aria-pressed="true">Fazer Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@stop

@section('adminlte_js')
{{-- Arquivos de js --}}
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/institution/mask.js') }}"></script>
<script src="{{ asset('assets/institution/script.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>

@stop