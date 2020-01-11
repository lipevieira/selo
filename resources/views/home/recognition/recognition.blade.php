@extends('adminlte::page')

@section('title', 'Instiuições Reconhecimento')

@section('content_header')
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h4>Instituições Cadastradas que são Reconhecimento.</h4>
    </div>
    <div class="box-body">
        <table class="table table-striped" id="tblInstitution">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">STATUS DE PENDÊNCIA</th>
                    <th scope="col">NOME</th>
                    <th scope="col">NOME FANTASIA</th>
                    <th scope="col">CPNJ</th>
                    <th scope="col">MUNICIPIO</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">RESPONSAEVEL TÉCNICO</th>
                    <th scope="col" class="action">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recognition as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>
                        @forelse ($item->documents as $document)
                            @if ($document->created_at >= $dates->date_open->format('Y-m-d') && $document->created_at <= $dates->date_close->format('Y-m-d'))
                                <span class="label label-success">Documento - Enviado</span>
                            @else
                                <span class="label label-danger ">Documento - Não Enviado</span>  
                            @endif
                            @empty
                                <span class="label label-danger ">Documento - Não Enviado</span>  
                         @endforelse
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->fantasy_name}}</td>
                    <td>{{$item->cnpj}}</td>
                    <td>{{$item->county}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->technical_manager}}</td>
                    <td class="actions_tables">
                        <a href="{{route('home.recognition.detalhes',$item->id)}}" class="btn btn-info btn-sm"
                            role="button">
                            <span class="glyphicon glyphicon-eye-open"></span> Visualizar
                        </a>
                        <button class="btn btn-danger btn-sm" id="idRecognition"
                            data-url="{{route('show.id.recognition')}}" idDelteRecognition="{{$item->id}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- Modal para preparar uma instituição para ser deletada do banco de dados --}}
<div class="modal fade" id="modalDeleteInstitution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Empresas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 style="text-align: center">Deseja realmente deletar essa Empresa/Instituição?</h3>
                <form id="insertBranche" method="POST" action="#">
                    @csrf
                    <input type="hidden" id="id_recognition_delete" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-danger" value="Confirmar" />
                    </div>
            </form>
        </div>
    </div>
</div>

@section('css')
<link rel="stylesheet" href="{{asset('assets/home/style.css')}}">
@stop

@section('js')
<script>
    $('#tblInstitution').DataTable({
        "bJQueryUI": true,
        "oLanguage": {
        "sProcessing": "Processando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "Não foram encontrados resultados",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
        "sInfoFiltered": "",
        "sInfoPostFix": "",
        "sSearch": "Pesquisar:",
        "sUrl": "",
        "oPaginate": {
        "sFirst": "Primeiro",
        "sPrevious": "Anterior",
        "sNext": "Seguinte",
        "sLast": "Último",
       
        }
    }
  });
    /****
     * Preparando para editar ações
     * @param id
     * @returns Branche
     */
     $('table tr td #idRecognition').on('click', function () {
        let url = $(this).data('url');
        var id = $(this).attr("idDelteRecognition");
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.getJSON({
            type: 'GET',
            url: url,
            data: { 'id': id },
            dataType: 'json',
            success: function (data) {
             
                $("#id_recognition_delete").val(data.id);

                $('#modalDeleteInstitution').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar Ação para Editar.");
            }
        });
    });
</script>
{{-- <script src="{{asset('js/libs/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('js/libs/jszip.min.js')}}"></script>
<script src="{{asset('js/libs/pdfmake.min.js')}}"></script>
<script src="{{asset('js/libs/vfs_fonts.js')}}"></script>
<script src="{{asset('js/libs/buttons.html5.min.js')}}"></script>

<script src="{{asset('assets/home/script.js')}}"></script> --}}
@stop
@stop