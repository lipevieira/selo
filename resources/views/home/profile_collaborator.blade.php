@extends('adminlte::page')

@section('title', 'Perfil Ético Racial')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>TABELA DO PERFIL/CENSO </h3>
                <p>Perfil Ético Racial dos colaboradores:</p>
                {{-- <p>Nessa tabela você tem a quantidade de possoas negras e não negras de todas as Instituições pelo seu nivel de
                    atividade por exemplo:</p> --}}
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover" id="tblActivityLevelCollaborator">
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
                        @foreach ($profileCollaborator as $item)
                        <tr>
                            <td>{{$item->fantasy_name}}</td>
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
    <script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('js/libs/jszip.min.js')}}"></script>
    <script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
    <script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/home/script.js')}}"></script>
    @stop