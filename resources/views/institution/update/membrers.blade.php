@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}

@section('body_class')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')

    <h1>Membros da Comissão</h1>

    <table class="table  table-bordered table-striped" id="tbl_menbress_comission">
        <thead>
            <tr>
                <th scope="col">COD</th>
                <th scope="col">Nome do funcionário</th>
                <th scope="col">Função / setor</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institutions->commissionMembers as $membrers)
            <tr>
                <th scope="row">{{$membrers->id}}</th>
                <td>{{$membrers->members_name}}</td>
                <td>{{$membrers->members_function}}</td>
                <td>{{$membrers->members_phone}}</td>
                <td>{{$membrers->members_email}}</td>
                <td>
                    <button class="btn btn-warning btn-sm" id="btnPrepareUpdate" data-url="{{route('show.comission')}}"
                        idEdit="{{$membrers->id}}">
                        <span class="glyphicon glyphicon-pencil"></span> Editar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal para editar Membros da comissão --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Membros da Comissão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Mostrar uma messagem error de validaçãode campos -->
                    <div class="alert alert-danger " style="display: none; " id="danger">
                        <ul></ul>
                    </div>
                    <form id="formUpdateComission" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="members_name" name="members_name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Função/Setor:</label>
                            <input type="text" class="form-control" id="members_function" name="members_function">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Telefone:</label>
                            <input type="text" class="form-control" id="members_phone" name="members_phone">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">E-mail:</label>
                            <input type="text" class="form-control" id="members_email" name="members_email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnConfirmeUpdate"
                        data-url="{{route('update.comission')}}">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{asset('assets/institution/update/membrers.js')}}"></script>

@stop