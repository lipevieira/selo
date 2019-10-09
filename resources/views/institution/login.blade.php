@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')

<div class="login-box">
    <div style="text-align: center;">
        <img src="{{asset('images/selo_horizontal.jpg')}}" width="200" height="75" class="d-inline-block align-top"
            alt="">
    </div>
    <h3 class="display-4">Bem-Vindo ao Selo da diversidade</h3>
   {{-- Messagem de sucesso para documentos salvos --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="login-box-body">
        <h2 class="login-box-msg">Login para Instituições</h2>
        <form action="{{ route('client.auth') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="E-mail da Instiutição">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control"
                    placeholder="CNPJ da instituição(Apenas números)" id="password">
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
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/institution/mask.js') }}"></script>
@yield('js')
@stop