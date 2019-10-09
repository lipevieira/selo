@extends('adminlte::page')

@section('title', 'Membros da Comissão')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>Membros da Comissão:</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tblMembrersComission">
                    <thead>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">NOME</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">FUNÇÃO/SETOR</th>
                            <th scope="col">TELEFONE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($membrers as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->institution->name}}</td>
                            <td>{{$item->members_name}}</td>
                            <td>{{$item->members_email}}</td>
                            <td>{{$item->members_function}}</td>
                            <td>{{$item->members_phone}}</td>
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
<script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('js/libs/jszip.min.js')}}"></script>
<script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
<script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
<script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/home/script.js')}}"></script>
@stop