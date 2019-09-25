@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}


@section('body_class' , 'login-page')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')


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
        <div class="box-header">
        </div>
        <div class="box-body">
            <form method="POST" action="{{route('schedule.store')}}">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Ações:</label>
                    <select class="form-control form-control-sm" id="schedule_action_id" name="schedule_action_id">
                        <option></option>
                        @foreach ($actions as $item)
                        <option value="{{$item->id}}" {{(old('schedule_action_id')==$item->id)? 'selected':''}}>
                            {{ $item->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">
                        Atividade (O que é necessário fazer para atingir este objetivo):
                    </label>
                    <textarea class="form-control" id="activity" name="activity">{{ old('activity') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Quantidade:</label>
                    <select class="form-control form-control-sm" name="amount">
                        <option value=""></option>
                        <option value="1" {{(old('amount')==1)? 'selected':''}}>1</option>
                        <option value="2" {{(old('amount')==2)? 'selected':''}}>2</option>
                        <option value="3" {{(old('amount')==3)? 'selected':''}}>3</option>
                        <option value="4" {{(old('amount')==4)? 'selected':''}}>4</option>
                        <option value="5" {{(old('amount')==5)? 'selected':''}}>5</option>
                        <option value="6" {{(old('amount')==6)? 'selected':''}}>6</option>
                        <option value="12" {{(old('amount')==12)? 'selected':''}}>12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Data Limite:</label>
                    <input type="date" class="form-control" id="deadline" value="{{ old('deadline') }}" name="deadline">
                </div>
                <br /><br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
{{-- Arquivos JS --}}

@stop