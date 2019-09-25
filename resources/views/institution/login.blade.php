@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
{{-- <div class="container">
    <div class="jumbotron">
        <h3 class="display-4">Bem-Vindo ao Selo da diversidade étnico racial!</h3>
        <p class="lead">
            Se já é cadastrado em nosso sistema por favor, faça login informando as credenciais abaixo.
        </p>
    </div>
</div> --}}
<div class="login-box">
    {{-- <div class="login-logo">
        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE')
            !!}</a>
    </div> --}}
    <!-- /.login-logo -->
  <h3 class="display-4">Bem-Vindo ao Selo da diversidade</h3>
    

    <div class="login-box-body">
        <h2 class="login-box-msg">Login para Instituições</h2>
        <form action="{{ route('client.auth') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Informe o E-mail da Instiutição">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control"
                    placeholder="Informe o CNPJ da instituição">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit"
                        class="btn btn-primary btn-block btn-flat">{{ trans('adminlte::adminlte.sign_in') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="auth-links">
            <a href="{{ route('start.register') }}" class="text-center">Cadastrar uma nova Instituição</a>
        </div>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
</script>
@yield('js')
@stop