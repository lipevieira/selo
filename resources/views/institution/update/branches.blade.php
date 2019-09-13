@extends('layouts.site')

@section('title', 'Area de atualização')

@section('content')
@include('layouts.nav-bar-institution')

<h1>Filiais</h1>
<br>
<button type="button" class="btn btn-success btn-sm">Inseir novas Filiais</button>
<br /><br />
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">COD</th>
            <th scope="col">INSTITUIÇÃO</th>
            <th scope="col">FILIAL</th>
            <th scope="col">EDITAR</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($institutions->branches as $branche)
        <tr>
            <td>{{$branche->id}}</td>
            <td>{{$branche->institution->name}}</td>
            <td>{{$branche->cnpj_additional}}</td>
            <td>
                <button class="btn btn-warning btn-sm" id="btnPrepareUdate" data-url="#" idEdit="{{$branche->id}}">
                    <span class="glyphicon glyphicon-pencil"></span> Editar
                </button>
            </td>
        </tr>
        @empty
        <h3>Essa Instituição não tem Filiais.</h3>
        @endforelse
    </tbody>
</table>

@endsection