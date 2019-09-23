<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="{{route('index.client')}}">Instituição</a></li>
                <li><a class="navbar-brand" href="{{route('auth.membrers')}}">Membros</a></li>
                <li><a class="navbar-brand" href="{{route('diagnostico.censitario.index')}}">Diagnóstico
                        Censitário</a></li>
                <li><a class="navbar-brand" href="{{route('get.shedule.index')}}">Cronograma</a></li>
                <li><a class="navbar-brand" href="{{route('get.branches.index')}}">Filiais</a></li>
                <li><a class="navbar-brand" href="{{route('logout')}}">Sair</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>