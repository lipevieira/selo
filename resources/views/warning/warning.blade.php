@extends('adminlte::master')

@section('adminlte_css')
@yield('css')
@stop

@section('body_class')

@section('body')

<div class="error-content" style="text-align: center">
    <h1><i class="fa fa-warning text-yellow"> </i> Atenção.</h1>
    <h3>Não estamos no período de castramento ou atualizações do plano de trabalho!!</h3>
    <h3>A data de abertura do sistema é: <strong>{{$dateOpenClose->date_open->format('d/m/Y')}}</strong></h3>
    <h3>A data de encerramento do sistema é: <strong>{{$dateOpenClose->date_close->format('d/m/Y')}}</strong></h3>
</div>
@stop

@section('adminlte_js')


@stop