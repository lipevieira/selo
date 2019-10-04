@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}

@section('body_class')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')
    <div class="row show-grid">
        <div class="col-md-8">
            {{-- Messagem de sucesso para documentos salvos --}}
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">COD</th>
                        <th scope="col">Data de Envio</th>
                        <th scope="col">Descrição do documento</th>
                        <th scope="col">Ver Documento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                    <tr>
                        <th scope="row">{{ $document->id }}</th>
                        <td>{{ $document->created_at }}</td>
                        <td>{{ $document->description }}</td>
                        <td>
                       <a href="#" class="btn btn-info btn-sm" role="button">
                        <span class="glyphicon glyphicon-folder-open"></span> Documento
                    </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Formularios de cadastro de documentos --}}
        <div class="col-md-4">
            <p>Depois de baixar os anexos e prenche-los, por favor envie eles por aqui. </p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ route('save.doc') }}">
                @csrf
                <div class="form-group">
                    <label for="doc_name">Documento</label>
                    <input type="file" class="form-control" id="doc_name" name="doc_name">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Descrição do Documento:</label>
                    <textarea class="form-control" id="message-text" id="description" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="btnSavedoc">Salvar Documento</button>
            </form>
        </div>
    </div>
</div>
<!-- Modal Cadastro de Documentos -->
<div class="modal fade" id="modalDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Cadastro de Documentos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mostrar uma messagem error de validaçãode campos -->
                <div class="alert alert-danger " style="display: none; " id="danger">
                    <ul></ul>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>



@stop

@section('adminlte_js')
<script src="{{asset('assets/institution/doc/doc.js')}}"></script>

@stop