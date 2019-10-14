@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h4>Instituições Cadastradas que são Reconhecimento.</h4>
    </div>
    <div class="box-body">
        <table class="table table-striped" id="tblInstitution">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">NOME</th>
                    <th scope="col">NOME FANTASIA</th>
                    {{-- <th scope="col">RAMO DE ATIVIDADE</th> --}}
                    <th scope="col">CPNJ</th>
                    <th scope="col">MUNICIPIO</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">RESPONSAEVEL TÉCNICO</th>
                    <th scope="col" class="action">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recognition as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->fantasy_name}}</td>
                    {{-- <td>{{$item->company_classification}}</td> --}}
                    <td>{{$item->cnpj}}</td>
                    <td>{{$item->county}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->technical_manager}}</td>
                    <td class="actions_tables">
                        <a href="{{route('home.recognition.detalhes',$item->id)}}" class="btn btn-info btn-sm"
                            role="button">
                            <span class="glyphicon glyphicon-eye-open"></span> Visualizar
                        </a>
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
{{-- <script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('js/libs/jszip.min.js')}}"></script>
<script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
<script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
<script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>

<script src="{{asset('assets/home/script.js')}}"></script> --}}
@stop
@stop