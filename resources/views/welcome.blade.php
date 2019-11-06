@extends('adminlte::master')

@section('adminlte_css')
{{-- Arquivos de css --}}
<link rel="stylesheet" href="{{asset('assets/institution/register/style.css ')}}">
@yield('css')
@stop

@section('body_class')

@section('body')

<div class="container">
    <div class="logo">
        <img src="{{asset('images/pag_start/capa_start.jpg')}}" width="800" height="800"
            class="d-inline-block align-top" alt="">
    </div>
    <div class="logo">
        <button id="btn_semur" data-url="{{route('login')}}">
            <img src="{{asset('images/pag_start/button_blue.jpg')}}" width="330" height="330">
        </button>

        <button id="btn_login" data-url="{{route('login.client')}}">
            <img src="{{asset('images/pag_start/button_green.jpg')}}" width="190" height="225">
        </button>

        <button id="btn_register" data-url="{{route('start.register')}}">
            <img src="{{asset('images/pag_start/button_orange.jpg')}}" width="190" height="180">
        </button>
    </div>
</div>
@stop

@section('adminlte_js')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/institution/mask.js') }}"></script>
<script src="{{ asset('assets/institution/register/script.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    /**
     * @description: Chamando a tela de login
     * para usuários da semur
    */
    $('#btn_semur').on('click', function(){
      let url = $(this).data('url');
      window.location.href = url;
    });
    /**
    * @description: Chamando a tela de login
    * para Instiuições do tipo compromisso
    */
    $('#btn_login').on('click', function(){
      let url = $(this).data('url');
      window.location.href = url;
    });
    /**
    * @description: Chamando a tela de cadastro
    * de Instituições 
    */
    $('#btn_register').on('click', function(){
    let url = $(this).data('url');
    window.location.href = url;
    });
</script>

@stop