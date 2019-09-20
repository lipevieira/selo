@extends('layouts.site')

@section('title', 'Area de atualização')

@section('content')
@include('layouts.nav-bar-institution')


{{-- Messagem de error de formulario --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- Messagem de error da Data Limite do cronograma --}}
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form method="POST" action="{{route('schedule.update')}}">
    @csrf
<input type="hidden" value="{{$schedule->id}}" name="id">
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Status:</label>
        <select class="form-control form-control-sm" id="status" name="status">
            <option value="{{$schedule->status}}">{{$schedule->status}}</option>
            <option value="Pedente">Pedente</option>
            <option value="Realizado">Realizado</option>
        </select>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">
            Atividade (O que é necessário fazer para atingir este objetivo):
        </label>
    <textarea class="form-control" id="activity" name="activity">{{$schedule->activity}}</textarea>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">Quantidade:</label>
        <select class="form-control form-control-sm" name="amount">
        <option value="{{$schedule->amount}}">{{$schedule->amount}}</option>
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
        <input type="date" class="form-control" id="deadline" value="{{$schedule->deadline->format('Y-m-d')}}" name="deadline">
    </div>
    <br /><br />
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

@endsection