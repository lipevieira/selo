@extends('adminlte::page')

@section('title', 'Ações do Cronograma')

@section('content_header')
<h1>Ações do Cronograma</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <table class="table table-striped" id="tblSheduleAction"> 
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">NOME DA AÇÃO</th>
                    <th scope="col">PESO</th>
                    <th scope="col">EDITAR/EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scheduleActions as $action)
                <tr>
                    <th scope="col">{{$action->id}}</th>
                    <th scope="col">{{$action->description}}</th>
                    <th scope="col">{{$action->weight}}</th>
                    <th scope="col">
                        <a href="{{route('home.details.institution',$action->id)}}" class="btn btn-warning btn-sm" role="button">
                           <span class="glyphicon glyphicon-pencil"></span> Editar
                        </a>
                        <button class="btn btn-danger btn-sm " id="btnExcluirDocumento">
                            <span class="glyphicon glyphicon-trash"></span> Excluir
                        </button>
                    </th>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="{{asset('assets/shedule_action/script.js')}}"></script>
@stop