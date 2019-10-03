@extends('adminlte::page')

@section('title', 'Nivel de atividade')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>Nivel de atividade dos colaboradores:</h3>
                <p>Nessa tabela você tem a quantidade total de pessoas negras e não negras de todas as Instituições.</p>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tblActivityLevelCollaborator">
                    <thead>
                        <tr>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">RAÇA/COR</th>
                            <th scope="col">Nº HOMEMS</th>
                            <th scope="col">Nº MULHERES</th>
                            <th scope="col">TOTAL DE PESSOAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activitLevelCollabator as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->max_human}}</td>
                            <td>{{$item->max_woman}}</td>
                            <td>{{$item->max_human + $item->max_woman}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">RAÇA/COR</th>
                            <th scope="col">Nº HOMEMS</th>
                            <th scope="col">Nº MULHERES</th>
                            <th scope="col">TOTAL DE PESSOAS</th>
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