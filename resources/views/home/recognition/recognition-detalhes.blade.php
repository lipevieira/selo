@extends('adminlte::page')

@section('title', 'Instituições Reconhecimento')

@section('content_header')
<h1>Informações Completas</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h4>IDENTIFICAÇÃO DA INSTITUIÇÃO RECONHECIMENTO.</h4>
    </div>
    <div class="box-body">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="name">Nome da Instituição proponente <small class="asterisco-input">*</small>
                </label>
                <input type="text" class="form-control " name="name" id="name" value="{{ $recognition->name }}">
            </div>
            <div class="col-md-4 mb-3 ">
                <label for="fantasy_name">Nome para certificação (nome fantasia) <small
                        class="asterisco-input">*</small>
                </label>
                <input type="text" class="form-control" id="fantasy_name" value="{{ $recognition->fantasy_name }}"
                    name="fantasy_name">
            </div>
            <div class="col-md-4 mb-3">
                <label for="email_two">Classificação da Empresa</label>
                <select class="form-control form-control-sm" id="company_classification" name="company_classification">
                    @foreach ($companyClassifications as $item)
                    @if ($item->id == $recognition->company_classification)
                    <option value="{{$item->id}}">{{$item->type}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cnpj">CNPJ <small class="asterisco-input">*</small></label>
                <input type="text" class="form-control" id="cnpj" value="{{ $recognition->cnpj }}" name="cnpj">
            </div>
            <div class="col-md-4 mb-3">
                <label for="county">Município <small class="asterisco-input">*</small></label>
                <select class="form-control form-control-sm" name="county">
                    <option>{{ $recognition->county }}</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="uf">UF:</label>
                <input type="text" class="form-control" id="uf" value="BA" name="uf" readonly="readonly">
            </div>
            <div class="col-md-4 mb-3">
                <label for="address">Endereço <small class="asterisco-input">*</small></label>
                <input type="text" class="form-control" id="address" value="{{ $recognition->address }}" name="address">
            </div>
            <div class="col-md-4 mb-3">
                <label for="email">E-mail:<small class="asterisco-input">*</small></label>
                <input type="email" class="form-control" id="email" placeholder="E-mail"
                    value="{{ $recognition->email }}" name="email">
            </div>
            <div class="col-md-4 mb-3">
                <label for="phone">Telefone <small class="asterisco-input">*</small></label>
                <input type="text" class="form-control" id="phone" value="{{ $recognition->phone }}" name="phone">
            </div>
            <div class="col-md-4 mb-3">
                <label for="technical_manager">Responsável técnico <small class="asterisco-input">*</small></label>
                <input type="text" class="form-control" value="{{ $recognition->technical_manager }}"
                    name="technical_manager">
            </div>
            <div class="col-md-4 mb-3">
                <label for="formation">Formação <small class="asterisco-input">*</small></label>
                <input type="text" class="form-control" value="{{ $recognition->formation }}" name="formation">
            </div>
            <div class="col-md-4 mb-3">
                <label for="phone_two">Telefone</label>
                <input type="text" class="form-control" value="{{ $recognition->phone_two }}" name="phone_two">
            </div>
            <div class="col-md-12 mb-3">
                <label for="email_two">Ramo de Atividade <small class="asterisco-input">*</small></label>
                <select class="form-control form-control-sm" name="institution_activity">
                    <option>{{ $recognition->institution_activity }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <h4>Documentos da Instituição</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">CÓDICO</th>
                        <th scope="col">DATA DE ENVIO</th>
                        <th scope="col">VER DOCUMENTO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recognition->documents as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td> {{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('recongnition.show.document',$item->doc_name) }}"
                                class="btn btn-info btn-sm" role="button" target="_blank">
                                <span class="glyphicon glyphicon-folder-open"></span> Documento
                            </a>
                            <a href="{{route('show.document.recognition.delete', $item->id)}}" class="btn btn-danger btn-sm"
                                role="button">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </a>
                        </td>
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
<script>
    // console.log('Hi!'); 
</script>
@stop