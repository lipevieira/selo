@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}
<style>
.container{
    background-color: #eeeeee;
}
</style>


@section('body_class')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')
    {{-- Errors para Inputs --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- Caso acontessa algum error ao enviar arquivo para o servidor mostrar está MSG --}}
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="">
        <div class="box-header">
            <h3>Salvar Cronograma</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="{{route('schedule.store')}}">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Ações:</label>
                    <select class="form-control form-control-sm" id="schedule_action_id" name="schedule_action_id">
                        <option value=""></option>
                        @foreach ($actions as $item)
                        <option value="{{$item->id}}" {{(old('schedule_action_id')==$item->id)? 'selected':''}}>
                            {{ $item->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">
                        Atividade (O que é necessário fazer para concluir essa ação):
                    </label>
                    <textarea class="form-control" id="activity" name="activity" rows="6">{{ old('activity') }}</textarea>
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
                        <option value="13" {{(old('amount')==13)? 'selected':''}}>13</option>
                        <option value="14" {{(old('amount')==14)? 'selected':''}}>14</option>
                        <option value="15" {{(old('amount')==15)? 'selected':''}}>15</option>
                        <option value="16" {{(old('amount')==16)? 'selected':''}}>16</option>
                        <option value="17" {{(old('amount')==17)? 'selected':''}}>17</option>
                        <option value="18" {{(old('amount')==18)? 'selected':''}}>18</option>
                        <option value="19" {{(old('amount')==19)? 'selected':''}}>19</option>
                        <option value="20" {{(old('amount')==20)? 'selected':''}}>20</option>
                        {{-- <option value="Permanente" {{(old('amount')=='Permanente')? 'selected':''}}>Permanente</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Data Limite:(Será a Data que você concluiará a
                        tividade escolhida para a Ação)</label>
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