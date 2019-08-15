@extends('adminlte::page')

@section('title', 'Perfil e nivel de atividade')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3>Nivel de atividade dos colaboradores:</h3>
            </div>
            <div class="box-body">
                <table class="table" id="tblLevelActivity">
                    <thead>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">NIVEL DE ATIVIDADE</th>
                            <th scope="col">RAÇA/COR</th>
                            <th scope="col">Nº HOMEMS</th>
                            <th scope="col">Nº MULHERES</th>

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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3>Perfil étnico racial dos colaboradores:</h3>
            </div>
            <div class="box-body">
                <table class="table" id="tblProfileCollaborators">
                    <thead>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">RAÇA/COR</th>
                            <th scope="col">Nº HOMEMS</th>
                            <th scope="col">Nº MULHERES</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profileCollaborators as $perfil)
                        <tr>
                            <th scope="row">{{$perfil->id}}</th>
                            <td>{{$perfil->institution->name}}</td>
                            <th>{{$perfil->profile_color}}</th>
                            <th>{{$perfil->human_quantity}}</th>
                            <th>{{$perfil->woman_quantity}}</th>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{asset('assets/home/script.js')}}"></script>
@stop