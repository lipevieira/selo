@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}


@section('body_class')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')

    <h3 style="text-align: center">Cronograma (Data limite de entrega das atividades será <strong> 30/11/{{$yearNow }}</strong>)</h3>
    <br />

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <table class="table table-striped" id="tblShedule">
        <thead>
            <tr>
                <a href="{{route('show.schedule.insert')}}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">Inseir Ações</a><br /><br />
            </tr>
            <tr>
                <th scope="col">COD</th>
                <th scope="col">INSTITUIÇÃO</th>
                <th scope="col">AÇÕES</th>
                <th scope="col">ATIVIDADE</th>
                <th scope="col">QUANTIDADE</th>
                <th scope="col">STATUS</th>
                <th scope="col">DATA LIMITE</th>
                <th scope="col">ALTORIZAÇÃO DAS AÇÕES</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institutions->schedules as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->institution->name}}</td>
                <td>{{$item->action->description}}</td>
                <td>{{$item->activity}}</td>
                <td>{{$item->amount}}</td>
                <td>
                    @if ($item->status == "Pendente")
                        <span class="label label-warning">{{$item->status}}</span>
                    @elseif($item->status == "Realizado")
                        <span class="label label-success">{{$item->status}}</span>
                    @endif
                </td>
                <td>{{$item->deadline->format('d/m/Y')}}</td>
                <td>{{$item->institution->authorization}}</td>
                <td>

                    </button>
                    <a href="{{route('showSchedule',$item->id)}}" class="btn btn-warning btn-sm" role="button"
                        aria-pressed="true">
                        <span class="glyphicon glyphicon-pencil"></span> Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('adminlte_js')
<script src="{{asset('assets/institution/update/schedule-update.js')}}"></script>

@stop