@extends('adminlte::page')

@section('title', 'Cronograma')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>Cronograma das Instituições:</h3>
            </div>
            <div class="box-body">
                <table class="table" id="tblShedule">
                    <thead>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">AÇÕES</th>
                            <th scope="col">ATIVIDADE</th>
                            <th scope="col">QUANTIDADE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">DATA LIMIT</th>
                            <th scope="col">ALTORIZAÇÃO DAS AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->institution->name}}</td>
                            <td>{{$item->action}}</td>
                            <td>{{$item->activity}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->deadline->format('d/m/Y')}}</td>
                            <td>{{$item->institution->authorization}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="http://selo.dev.com/js/libs/dataTables.bootstrap.min.js"></script>
<script src="http://selo.dev.com/js/libs/dataTables.buttons.min.js"></script>
<script src="http://selo.dev.com/js/libs/jszip.min.js"></script>
<script src="http://selo.dev.com/js/libs/pdfmake.min.js"></script>
<script src="http://selo.dev.com/js/libs/vfs_fonts.js"></script>
<script src="http://selo.dev.com/js/libs/buttons.html5.min.js"></script>
<script src="{{asset('assets/home/script.js')}}"></script>
@stop