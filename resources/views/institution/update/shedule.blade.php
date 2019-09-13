@extends('layouts.site')

@section('title', 'Area de atualização')

@section('content')
@include('layouts.nav-bar-institution')

<h1>Cronograma (Data limite de entrega das atividades será <strong> {{date('30/11/Y')}})</strong></h1>
<br />



<table class="table table-striped" id="tblShedule">
    <thead>
        <tr>
            <button type="button" class="btn btn-success btn-sm" id="btnInserOpenModal">Inseir Ações</button><br/><br/>
        </tr>
        <tr>
            <th scope="col">COD</th>
            <th scope="col">INSTITUIÇÃO</th>
            <th scope="col">AÇÕES</th>
            <th scope="col">ATIVIDADE</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">STATUS</th>
            <th scope="col">DATA LIMITE</th>
            <th scope="col">ALTORIZAÇÃO DAS AÇÕES</th>
            <th scope="col">EDITAR</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($institutions->schedules as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->institution->name}}</td>
            <td>{{$item->schedule->description}}</td>
            <td>{{$item->activity}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->deadline->format('d/m/Y')}}</td>
            <td>{{$item->institution->authorization}}</td>
            <td>
                <button class="btn btn-warning btn-sm" id="btnPrepareUdate" data-url="#" idEdit="{{$item->id}}">
                    <span class="glyphicon glyphicon-pencil"></span> Editar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Modal para salvar ou editar os dados do cronograma --}}

<div class="modal fade" id="modalSalveEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Inseir Ações</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mostrar uma messagem error de validaçãode campos -->
                <div class="alert alert-danger " style="display: none; " id="danger">
                    <ul></ul>
                </div>
                <form id="insertShedule" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Ações:</label>
                        <select class="form-control form-control-sm" id="schedule_action_id" name="schedule_action_id">
                            <option></option>
                            @foreach ($actions as $item)
                            <option value="{{$item->id}}">{{ $item->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">
                            Atividade (O que é necessário fazer para atingir este objetivo):
                        </label>
                        <textarea class="form-control" id="activity" name="activity"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Quantidade:</label>
                        <select class="form-control form-control-sm" name="amount">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Data Limite:</label>
                        <input type="date" class="form-control" id="deadline" value="" name="deadline">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnSaveShedule"
                    data-url="{{route('schedule.store')}}">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('footer')
<script src="{{asset('assets/institution/update.js')}}"></script>
@stop