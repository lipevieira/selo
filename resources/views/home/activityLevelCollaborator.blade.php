@extends('adminlte::page')

@section('title', 'Nivel de Atvidade dos Colaboradores')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>TABELA DE NIVEL DE ATIVIDADE DOS COLABORADORES:</h3>
                <p></p>
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
<script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('js/libs/jszip.min.js')}}"></script>
<script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
<script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
<script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/home/script.js')}}"></script>
@stop