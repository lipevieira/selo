@extends('adminlte::page')

@section('title', 'Cronograma')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3>Cronograma das Instituições:</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tblShedule">
                    <thead>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">AÇÕES</th>
                            <th scope="col">PESO</th>
                            <th scope="col">ATIVIDADE</th>
                            <th scope="col">QUANTIDADE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">DATA LIMITE</th>
                            <th scope="col">ALTORIZAÇÃO DAS AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($schedules as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->institution->name}}</td>
                            <td>{{$item->action->description}}</td>
                            <td>{{$item->action->weight}}</td>
                            <td>{{$item->activity}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->deadline->format('d/m/Y')}}</td>
                            <td>{{$item->institution->authorization}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">INSTITUIÇÃO</th>
                            <th scope="col">AÇÕES</th>
                            <th scope="col">PESO</th>
                            <th scope="col">ATIVIDADE</th>
                            <th scope="col">QUANTIDADE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">DATA LIMITE</th>
                            <th scope="col">ALTORIZAÇÃO DAS AÇÕES</th>
                            {{-- <th colspan="3" style="text-align:right">TOTAL:</th>
                            <th></th> --}}
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @stop

    @section('css')
<link rel="stylesheet" href="{{asset('assets/home/css/style.css')}}">
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