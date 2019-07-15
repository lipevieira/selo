<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif     
        <div class="container-company">
            <form>
                <div class="form-group">
                    <label for="cb_company">Indentificação da Empresa</label>
                    <select class="form-control form-control-sm" id="cb_company" data-url="{{route('index.company')}}">
                        <option></option>
                        <option>Micro(5 a 9 funcionários)</option>
                        <option>Pequena(10 a 12 funcionários)</option>
                        <option>Pequena(13 a 49 funcionários)</option>
                        <option>Média(50 a 99 funcionários)</option>
                        <option>Grande(+ de 100 funcionários)</option>
                        <option>ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIRAÇÃO DA DIVERSIDADE?</option>
                    </select>
                </div>
                <div class="form-group" id="etapa01">
                    <label for="cb_company_etapa01">PROPRIETÁRIO OU ADMINISTRADOR NEGRO?</label>
                    <select class="form-control form-control-sm" id="cb_company_01">
                        <option></option>
                        <option>SIM</option>
                        <option>NÃO</option>
                    </select>
                </div>
                <div class="form-group" id="etapa02">
                    <label for="cb_company_etapa02">MAIORIA DOS FUNCIONÁRIOS NEGROS?</label>
                    <select class="form-control form-control-sm" id="cb_company_02" data-url="{{route('index.company')}}">
                        <option></option>
                        <option>SIM</option>
                        <option>NÃO</option>
                    </select>
                </div>
                 <div class="form-group" id="etapa03">
                    <label for="cb_company_etapa03">ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIZAÇÃO DA DIVERSIDADE?</label>
                    <select class="form-control form-control-sm" id="cb_company_03" data-url="{{route('index.company')}}">
                        <option></option>
                        <option>SIM</option>
                        <option>NÃO</option>
                    </select>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>


    <script src="{{ asset('assets/institution/script.js') }}"></script>
</body>
</html>
