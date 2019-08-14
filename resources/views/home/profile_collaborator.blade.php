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
                <table class="table">
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
                        {{-- @foreach ($collaboratorActivity as $item)
                        @endforeach --}}
                            <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            </tr>
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
                <table class="table">
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>

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
<script>
    // console.log('Hi!'); 
</script>
@stop