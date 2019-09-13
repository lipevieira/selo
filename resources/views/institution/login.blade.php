@extends('layouts.site')

@section('title', 'Login da empresa')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Bem-Vindo ao Selo da diversidade étnico racial!</h1>
    <p class="lead">
        Se já é cadastrado em nosso sistema por favor, faça login informando as credenciais abaixo.
    </p>
    <hr class="my-4">
        <div class="login-institution">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        {{-- <form method="POST" action="{{route('auth.institution')}}">
            @csrf
                <div class="form-group">
                    <label for="email">Email da Instituição</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Informe o email" name="email">
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ da Instituição</label>
                    <input type="text" class="form-control" id="cnpj" placeholder="Informe o CNPJ" name="cnpj">
                </div>
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Acessar</button>
                </div>
            </form>
        </div> --}}

        <a href="{{route('auth.institution')}}">Acesso de teste</a>
    
</div>
@endsection