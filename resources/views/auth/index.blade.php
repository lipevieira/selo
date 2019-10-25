@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1>Usuários cadastrados que são Funcionarios da SEMUR</h1>
@stop

@section('content')



<div class="modal fade" id="cadUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mostrar uma messagem error de validaçãode campos -->
                <h3>Todos os Usuários cadastros Teram a Senha de 1 a 8</h3>
                <div class="alert alert-danger " style="display: none; " id="danger">
                    <ul></ul>
                </div>
                <form method="post" id="insertUser">
                    {!! csrf_field() !!}
                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.password') }}" readonly="readonly" value="12345678">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.retype_password') }}" readonly="readonly" value="12345678">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <button type="button" class="btn btn-primary btn-block btn-flat" id="btnSaveuser"
                        data-url="{{route('user.register')}}">Salvar</button>
            </div>
            <div class="modal-footer">
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Tabelas de Usuarios da SEMUR --}}
<div class="box">
    <div class="box-header">
        <h4>Gerenciamento de Usuários</h4>
    </div>
    <div class="box-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        {{-- Caso acontessa algum error ao enviar arquivo para o servidor mostrar está MSG --}}
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <table class="table">
            <tr>
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#cadUsers">
                    <span class="glyphicon glyphicon-plus"></span> Inserir novo usuário
                </button>
            </tr>
            <br/><br/>
            <thead>
                <tr>
                    <th scope="col">CÓDICO</th>
                    <th scope="col">NOME</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <a href="{{route('resert.user', $user->id)}}" class="btn btn-warning btn-sm" role="button">
                                <span class="glyphicon glyphicon-pencil"></span> Resetar Senha
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script src="{{asset('assets/users/script.js')}}"></script>
@stop