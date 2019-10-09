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
        <table class="table table-striped" id="tblInstitution">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">NOME</th>
                    <th scope="col">NOME FANTASIA</th>
                    <th scope="col">RAMO DE ATIVIDADE</th>
                    <th scope="col">CPNJ</th>
                    <th scope="col">MUNICIPIO</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">RESPONSAEVEL TÉCNICO</th>
                    <th scope="col" class="action">AÇÕES</th>
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
                        <a href="{{route('home.details.institution',$item->id)}}" class="btn btn-info btn-sm" role="button">
                                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
                            </a>
                            {{-- TO-DE Fazer: BOtão para desativa uma instituição --}}
                            {{-- <button class="btn btn-danger btn-sm " id="btnExcluirDocumento">
                                <span class="glyphicon glyphicon-trash"></span> Desativar
                            </button> --}}
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
<script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('js/libs/jszip.min.js')}}"></script>
<script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
<script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
<script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>

<script src="{{asset('assets/home/script.js')}}"></script>
@stop
@stop