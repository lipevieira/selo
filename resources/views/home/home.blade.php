@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

@stop

@section('content')

{{-- Messagem de sucesso ao atualizar datas de abertura --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
{{-- Messagem de error caso  ocorra algum erro na atualização das datas de abertira e fechamento --}}
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
{{-- Messagem para erros de formularios --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="box">
    <div class="row">
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>
        
                <div class="info-box-content">
                    <form action="{{route('home.update.dates')}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <span class="info-box-text"><strong>DATA DE ABERTURA</strong></span>
                                <input type="date" class="form-control" id="date_open" name="date_open"
                                    value="{{$dates->date_open->format('Y-m-d')}}" required>
                            </div>
                            <div class="col-md-4 mb-4">
                               <span class="info-box-text"><strong>DATA DE ENCERRAMENTO </strong></span>
                                <input type="date" class="form-control" id="date_close" name="date_close"
                                    value="{{$dates->date_close->format('Y-m-d')}}" required>
                            </div>
                            <div class="col-md-4 mb-4">
                                {{-- <span class="info-box-text"><strong>ATUALIZAR DATAS</strong></span> --}}
                                <button type="submit" class="btn btn-success form-control" style="margin-top: 19px;">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        {{-- Formulario para documentos --}}
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                    <form action="{{route('update.anexos')}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <span class="info-box-text"><strong>Anexar Documento</strong></span>
                                <input type="file" class="form-control" id="" name="document" value="" required>
                            </div>
                            <div class="col-md-4 mb-4">
                               <span class="info-box-text"><strong>Nome Anexo</strong></span>
                                <select class="form-control form-control-sm" name="doc_name" required>
                                    <option value=""></option>
                                   <option value="anexo01.doc">Anexo - 01</option>
                                   <option value="anexo06.doc">Anexo - 06</option>
                                   <option value="anexo07.doc">Anexo - 07</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <button type="submit" class="btn btn-block btn-info" style="margin-top: 19px;">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    
    {{-- Final teste --}}
    <div class="box-header">
        <h3>Instituições cadastradas que são compromisso.</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-hover" id="tblInstitution">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">NOME</th>
                    <th scope="col">NOME FANTASIA</th>
                    <th scope="col">CPNJ</th>
                    <th scope="col">MUNICIPIO</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">RESPONSAEVEL TÉCNICO</th>
                    <th scope="col" class="action">DOCUMENTOS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instituions as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->fantasy_name}}</td>
                    <td>{{$item->cnpj}}</td>
                    <td>{{$item->county}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->technical_manager}}</td>
                    <td class="actions_tables">
                        <a href="{{route('home.details.institution',$item->id)}}" class="btn btn-info btn-sm"
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
<script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('js/libs/jszip.min.js')}}"></script>
<script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
<script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
<script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>

<script src="{{asset('assets/home/script.js')}}"></script>
@stop
@stop