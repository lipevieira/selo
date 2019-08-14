@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1>Instituições Cadastradas</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <table class="table" id="tblInstitution">
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Ramo de atividade</th>
                    <th scope="col">CPNJ</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Resposavel Técnico</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instituions as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->fantasy_name}}</td>
                        <td>{{$item->activity_branch}}</td>
                        <td>{{$item->cnpj}}</td>
                        <td>{{$item->county}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->technical_manager}}</td>
                        <td class="actions_tables">
                            <a href="#" class="btn btn-info btn-sm" role="button">
                                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
                            </a>
                            <button class="btn btn-warning btn-sm " id="btnEditarDocumento" >
                                <span class="glyphicon glyphicon-pencil"></span> Editar
                            </button>
                            <button class="btn btn-danger btn-sm " id="btnExcluirDocumento">
                                <span class="glyphicon glyphicon-trash"></span> Excluir
                            </button>
                        </td>
                
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('css')
<link rel="stylesheet" href="{{asset('assets/home/style.css')}}">
@stop

@section('js')
<script src="{{asset('assets/home/script.js')}}"></script>
@stop
@stop