@extends('adminlte::page')

@section('title', 'Perfil e nivel de atividade')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>Perfil dos colaboradores de todas as Instituições:</h3>
                <p>Nessa tabela você tem a quantidade de possoas negras e não negras de todas as Instituições pelo seu nivel de atividade por exemplo:</p>
                <p>Operacional, Supervisão,Gerência / Chefia e Direção</p>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tblLevelActivity">
                    <thead>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">NIVEL DE ATIVIDADE</th>
                            <th scope="col">RAÇA/COR</th>
                            <th scope="col">Nº HOMEMS</th>
                            <th scope="col">Nº MULHERES</th>
                            <th scope="col">TOTAL</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collaboratorActivitylevels as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->institution->name}}</td>
                            <td>{{$item->activity_level}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->human_quantity_activity_level}}</td>
                            <td>{{$item->woman_quantity_activity_level}}</td>
                            <td>{{$item->woman_quantity_activity_level + $item->human_quantity_activity_level}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">NIVEL DE ATIVIDADE</th>
                            <th scope="col">RAÇA/COR</th>
                            <th scope="col">Nº HOMEMS</th>
                            <th scope="col">Nº MULHERES</th>
                            <th scope="col">TOTAL</th>
                        </tr>
                    </tfoot>
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