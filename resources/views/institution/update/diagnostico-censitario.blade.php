@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}
<link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">

@section('body_class')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')

    <div class="question-color">
        <h1 style="text-align: center">Diagnóstico Censitário</h1>
        {{-- Mostrando Messagem de atualização --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <br />
        <form action="{{route('update.answer')}}" method="POST">
            @csrf

            @foreach ($questionAlternatives as $question)
            <p><strong>{{ $question->name }}</strong></p>
            <div class="row">
                <div class="col-md-12 mb-3">
                    @if ($question->id == 1 || $question->id == 10)
                    <label>
                        Resposta <small class="asterisco-input">*</small>
                    </label>
                    @endif

                    <select class="form-control form-control-sm" name="alternative_id[]">
                        <option value=""></option>
                        @foreach ($question->alternatives as $alternativa)
                        <option value="{{$alternativa->id}}" @foreach ($institutions->answers as $answer)
                            @if ($alternativa->id == $answer->alternative_id)
                                selected
                            @endif
                        @endforeach
                            >{{ $alternativa->alternative }}
                        </option>
                        @endforeach
                    </select>

                    @if($question->field_option == "SIM")
                        @foreach ($question->alternatives as $alternativa)
                            @foreach ($institutions->answers as $answer)
                                @if ($alternativa->id == $answer->alternative_id )
                                    @if ($question->id == 7)
                                        <label for="others">Se outros, quais?</label>
                                    @else
                                        <label for="others">Se sim, quais?</label>
                                    @endif
                                        <input type="text" class="form-control" name="others[]" id="others" value="{{$answer->others}}">
                                    @endif
                                    @endforeach
                                @endforeach
                    @else
                        <input type="hidden" class="form-control" name="others[]" id="others">
                    @endif
                </div>
            </div>
            @endforeach
            {{-- Teste --}}
            @foreach ($institutions->answers as $answer)
                <input type="hidden" class="form-control" name="id[]" id="id" value="{{$answer->id}}">
            @endforeach
            <br><br>
            <div style="text-align: center">
                <button type="submit" class="btn btn-success">Atualizar Diagnóstico Censitário</button>
            </div>
            <br><br>
        </form>
    </div>

    {{-- Tabelas perfil colaborador --}}
    <div class="form-group col-md-12 mb-3">
        <h4>
            <strong>Nivel de atividade dos colaboradores: Demais grupos
                étnicos-raciais e Negros (pretos + pardos).
            </strong>
        </h4>
        <table class="table table-bordered table-striped" id="tblLevelActivicDemiasGroups">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">NIVEL DE ATIVIDADE</th>
                    <th scope="col">RAÇA/COR</th>
                    <th scope="col">Nº HOMEMS</th>
                    <th scope="col">Nº MULHERES</th>
                    <th scope="col">ALTERAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($institutions->collaboratorActivityLevels as
                $collaboratorActivityLevel)
                <tr>
                    <th scope="row">{{$collaboratorActivityLevel->id}}</th>
                    <td>{{$collaboratorActivityLevel->activity_level}}</td>
                    <td>{{$collaboratorActivityLevel->color}}</td>
                    <td>{{$collaboratorActivityLevel->human_quantity_activity_level}}</td>
                    <td>{{$collaboratorActivityLevel->woman_quantity_activity_level}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" id="btnPrepareUdate"
                            data-url="{{route('show.edit.cencisitario')}}" idEdit="{{$collaboratorActivityLevel->id}}">
                            <span class="glyphicon glyphicon-pencil"></span> Editar
                        </button>
                    </td>
                </tr>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal para editar os dados  Nivel de atividade dos colaboradores --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Editar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateCollaboratorActivityLevel" method="POST" action="{{route('update.censitario')}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" class="form-control" id="id_collaborator" name="id">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nivel de Atividade:</label>
                            <input type="text" class="form-control" id="activity_level" name="activity_level"
                                readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Raça/Cor:</label>
                            <input type="text" class="form-control" id="color" name="color" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nº Homens:</label>
                            <input type="text" class="form-control" id="human_quantity_activity_level"
                                name="human_quantity_activity_level">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nº Mulheres:</label>
                            <input type="text" class="form-control" id="woman_quantity_activity_level"
                                name="woman_quantity_activity_level">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnSaveEditDiagnosticoCensitario">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{asset('assets/institution/update/censitario-update.js')}}"></script>

@stop