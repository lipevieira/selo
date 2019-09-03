@extends('adminlte::page')

@section('title', 'Ações do Cronograma')

@section('content_header')
<h1>Ações do Cronograma</h1>
@stop

@section('content')
<button type="button" class="btn btn-success btn-sm" id="btnOpenModal">
    <span class="glyphicon glyphicon-plus"></span> Inserir novas ações
</button></br></br>
<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <table class="table table-striped" id="tblSheduleAction">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">DESCRIÇÃO DA AÇÃO</th>
                    <th scope="col">PESO</th>
                    <th scope="col">EDITAR/EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scheduleActions as $action)
                <tr>
                    <th scope="col">{{$action->id}}</th>
                    <th scope="col">{{$action->description}}</th>
                    <th scope="col">{{$action->weight}}</th>
                    <th scope="col">
                        <button class="btn btn-warning btn-sm" id="btnPrepareUdate"
                            data-url="{{route('show.shedule.action')}}" idEdit="{{$action->id}}">
                            <span class="glyphicon glyphicon-pencil"></span> Editar
                        </button>

                        <button class="btn btn-danger btn-sm " id="btnDelete"
                             data-url="{{route('show.shedule.action')}}" idDelete="{{$action->id}}">
                            <span class="glyphicon glyphicon-trash"></span> Excluir
                        </button>
                    </th>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalInserUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalInserUpdate">Cadastro de Ações</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mostrar uma messagem error de validaçãode campos -->
                <div class="alert alert-danger " style="display: none; " id="danger">
                    <ul></ul>
                </div>
                <form id="insertActionShedule" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="" id="id">

                    <div class="form-group">
                        <label for="weight">Peso da Ação</label>
                        <select class="form-control" id="weight" name="weight" value="">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Descrição da Ação:</label>
                        <textarea class="form-control" id="description" name="description" value=""></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnSaveAction"
                    data-url="{{route('store.shedule.action')}}">
                    Salvar Ação
                </button>
                <button type="button" class="btn btn-success" id="btnUpdate" data-url="{{route('update.shedule.action')}}">
                    Atualizar Ação
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirma a exclusão de cliente no sistema -->
<div class="modal" tabindex="-1" role="dialog" id="confirmaExclucao">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-body">
                <center>
                    <h4>Deseja realmente excluir esta ação?</h4>
                    <center>
                        <form method="POST" action="">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id_excluir" id="id_excluir" value="">
                        </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger btn-sm" id="btnConfirmarExclusao" data-url="{{route('delete.shedule.action')}}">
                    Confirmar Exclusão
                </button>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{asset('assets/shedule_action/style.css')}}">
@stop

@section('js')
<script src="{{asset('assets/shedule_action/script.js')}}"></script>
@stop