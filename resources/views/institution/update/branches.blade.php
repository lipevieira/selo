@extends('layouts.site')

@section('title', 'Area de atualização')

@section('content')
@include('layouts.nav-bar-institution')

<h1>Filiais</h1>
<br>
<button type="button" class="btn btn-success btn-sm" id="btnSaveBranche">Inseir novas Filiais</button>
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
            <button class="btn btn-warning btn-sm" id="btnPrepareUpdate" data-url="{{route('branche.show')}}" idEdit="{{$branche->id}}">
                    <span class="glyphicon glyphicon-pencil"></span> Editar
                </button>
                <button class="btn btn-danger btn-sm " id="btnDelete" idExcluir="{{$branche->id}}"
                    data-url="{{route('branche.show')}}">
                    <span class="glyphicon glyphicon-trash"></span> Excluir
                </button>
            </td>
        </tr>
        @empty
        <h3>Essa Instituição não tem Filiais.</h3>
        @endforelse
    </tbody>
</table>

<div class="modal fade" id="modalSaveEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filiais</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mostrar uma messagem error de validaçãode campos -->
                <div class="alert alert-danger " style="display: none; " id="danger">
                    <ul></ul>
                </div>
                <form id="insertBranche" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">CNPJ da Filial:</label>
                        <input type="text" class="form-control" id="cnpj_additional" name="cnpj_additional">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmSave" data-url="{{route('branche.store')}}">Salvar</button>
            <button type="button" class="btn btn-success" id="btnUpdate" data-url="{{route('branche.update')}}">Atualizar</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal para excluir Filial --}}
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confimar exclusão</h5>
            </div>
            <div class="modal-body">
                <h2>Deseja realmente excluir está Filial?</h2>
                <form id="deleteBranche" method="POST" action="#">
                    @csrf
                    <input type="hidden" id="id_excluir" name="id_excluir">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-danger" id="btnConfirmarExclusao" data-url="{{route('branche.delete')}}">Confirmar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="{{asset('assets/institution/mask.js')}}"></script>
<script src="{{asset('assets/institution/update/branche.js')}}"></script>
@stop