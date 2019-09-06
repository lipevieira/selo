@extends('layouts.site')

@section('title', 'Login da empresa')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Bem-Vindo ao Selo da adiversidade étnico racial!</h1>
    <p class="lead">
        Se já é cadastrado em nosso sistema por favor, faça login informando as credenciais abaixo.
    </p>
    <hr class="my-4">
        <div class="login-institution">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Acessar</button>
                </div>
            </form>
        </div>
    
</div>
@endsection