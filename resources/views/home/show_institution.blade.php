@extends('adminlte::page')

@section('title', 'Detalhes da instituição')

@section('content_header')
<h1>Informações completa da instituição</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <form method="post" id="register_form">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active_tab1" style="border:1px solid #ccc"
                        id="list_instituicao_detalhes">Indentificação
                        da Instituição</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_diagnostico_censitario"
                        style="border:1px solid #ccc">Diagnóstico
                        Censitário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_plano_trabalho_etnico"
                        style="border:1px solid #ccc">Plano de
                        Trabalho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_cronograma" style="border:1px solid #ccc">Cronograma</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_parceiras" style="border:1px solid #ccc">Parceiras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_metodologia"
                        style="border:1px solid #ccc">Metodologia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_resultados_esperados" style="border:1px solid #ccc"
                        id="resultado">Resultados
                        Esperados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_documentos" style="border:1px solid #ccc"
                        id="documento">Documentos</a>
                </li>
            </ul>

            <!-- Campos de texto para descrever a instituição -->
            <div class="tab-content" style="margin-top:16px; ">
                <div class="tab-pane active" id="instituicao_detalhes">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong> IDENTIFICAÇÃO DA INSTITUIÇÃO</strong></div>
                        <div class="panel-body">
                            <!-- Inicio dos Inputs da Instituição-->
                            <input type="hidden" name="etapas" value="" id="etapas">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Nome da Instituição proponente: </label>
                                    <input type="text" class="form-control " name="name" id="name"
                                        value="{{$instituion->name}}">
                                </div>
                                <div class="col-md-4 mb-3 ">
                                    <label for="fantasy_name">Nome para certificação (nome fantasia): </label>
                                    <input type="text" class="form-control" id="fantasy_name"
                                        value="{{$instituion->fantasy_name}}" name="fantasy_name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email_two">Classificação da Empresa</label>
                                    <select class="form-control form-control-sm" id="company_classification"
                                        name="company_classification">
                                        @foreach ($companyClassifications as $classification)
                                        <option value="{{ $classification->id }}" @if ($instituion->
                                            company_classification == $classification->id)
                                            selected
                                            @endif
                                            >{{  $classification->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cnpj" style="color:red;">CNPJ:Usado como senha para Login</label>
                                    <input type="text" class="form-control" id="cnpj" value="{{$instituion->cnpj}}"
                                        name="cnpj">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="county">Município:</label>
                                    <select class="form-control form-control-sm" name="county">
                                        <option value="{{$instituion->county}}" selected>{{$instituion->county}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="uf">UF:</label>
                                    <input type="text" class="form-control" id="uf" value="{{$instituion->uf}}"
                                        name="uf" readonly="readonly">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="address">Endereço:</label>
                                    <input type="text" class="form-control" id="address" placeholder="Endereço:"
                                        value="{{$instituion->address}}" name="address">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email" style="color:red;">E-mail: usado para fazer Login</label>
                                    <input type="email" class="form-control" id="email" placeholder="E-mail"
                                        value="{{$instituion->email}}" name="email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone">Telefone:</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Telefone"
                                        value="{{$instituion->phone}}" name="phone">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="technical_manager">Responsável técnico:</label>
                                    <input type="text" class="form-control" id="technical_manager"
                                        value="{{$instituion->technical_manager}}" name="technical_manager">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="formation">Formação:</label>
                                    <input type="text" class="form-control" id="formation" placeholder="Formação:"
                                        value="{{$instituion->formation}}" name="formation">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone_two">Telefone:</label>
                                    <input type="text" class="form-control" id="phone_two" placeholder="Telefone:"
                                        value="{{$instituion->phone_two}}" name="phone_two">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email_two">Atividade:</label>
                                    <select class="form-control form-control-sm" name="institution_activity">
                                        <option value="{{$instituion->institution_activity}}">
                                            {{$instituion->institution_activity}}</option>
                                    </select>
                                </div>
                                <!-- Membros da comiisão -->
                                <h1 class="col-md-12 mb-3">
                                    Membros da Comissão
                                </h1>
                                <div class="col-md-12 mb-3">
                                    <table class="table  table-bordered table-striped" id="tbl_menbress_comission">
                                        <thead>
                                            <tr>
                                                <th scope="col">COD</th>
                                                <th scope="col">Nome do funcionário</th>
                                                <th scope="col">Função / setor</th>
                                                <th scope="col">Telefone</th>
                                                <th scope="col">E-mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($instituion->commissionMembers as $membrers)
                                            <tr>
                                                <th scope="row">{{$membrers->id}}</th>
                                                <td>{{$membrers->members_name}}</td>
                                                <td>{{$membrers->members_function}}</td>
                                                <td>{{$membrers->members_phone}}</td>
                                                <td>{{$membrers->members_email}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- CNPJ Adicionias. Estes campos são opcionais -->
                                    <h1>
                                        Empresas Filiais
                                    </h1>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">COD</th>
                                                <th scope="col">INSTITUIÇÃO</th>
                                                <th scope="col">FILIAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($instituion->branches as $branche)
                                            <tr>
                                                <td>{{$branche->id}}</td>
                                                <td>{{$branche->institution->name}}</td>
                                                <td>{{$branche->cnpj_additional}}</td>
                                            </tr>
                                            @empty
                                            <h3>Essa Instituição não tem Filiais.</h3>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Campos de texto para descrever o Diagnóstico Censitário -->
                <div class="tab-pane fade" id="diagnostico_censitario">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>QUESTIONÁRIO PARA DIAGNÓSTICO CENSITÁRIO</strong></div>
                        <div class="panel-body">
                            <!-- Inicio das Questões -->
                            @foreach ($questionAlternatives as $question)
                            
                            <p><strong>{{ $question->name }}</strong></p>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Resposta</label>
                                    <select class="form-control form-control-sm" name="alternative_id[]">
                                        <option value=""></option>
                                        @foreach ($question->alternatives as $alternativa)
                                        <option value="{{$alternativa->id}}" 
                                        @foreach ($instituion->answers as $answer)
                                            @if ($alternativa->id == $answer->alternative_id)
                                            selected
                                            @endif
                                        @endforeach
                                            >{{ $alternativa->alternative }}
                                        </option>

                                        @endforeach
                                    </select>

                                    @if($question->field_option == "SIM")
                                    @foreach ($question->alternatives as $alternativa)
                                    @foreach ($instituion->answers as $answer)
                                    @if ($alternativa->id == $answer->alternative_id && $answer->others != null)
                                    <label for="others">Se sim, quais?</label>
                                    <input type="text" class="form-control" name="others[]" id="others"
                                        value="{{$answer->others}}">
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @else
                                    <input type="hidden" class="form-control" name="others[]" id="others">
                                    @endif
                                </div>

                            </div>
                            @endforeach
                            {{-- Tabelas perfil colaborador --}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4>NIVEL DE ATIVIDADE DOS COLABORADORES</h4>
                                    <table class="table table-bordered table-striped table-hover" id="tblLevelActivity">
                                        <thead>
                                            <tr>
                                                <th scope="col">COD</th>
                                                <th scope="col">NIVEL DE ATIVIDADE</th>
                                                <th scope="col">RAÇA/COR</th>
                                                <th scope="col">Nº HOMEMS</th>
                                                <th scope="col">Nº MULHERES</th>
                                                <th scope="col">TOTAL DE PESSOAS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($instituion->collaboratorActivityLevels as
                                            $collaboratorActivityLevel)
                                            <tr>
                                                <th scope="row">{{$collaboratorActivityLevel->id}}</th>
                                                <td>{{$collaboratorActivityLevel->activity_level}}</td>
                                                <td>{{$collaboratorActivityLevel->color}}</td>
                                                <td>{{$collaboratorActivityLevel->human_quantity_activity_level}}</td>
                                                <td>{{ $collaboratorActivityLevel->woman_quantity_activity_level }}</td>
                                                <td>{{ $collaboratorActivityLevel->woman_quantity_activity_level + $collaboratorActivityLevel->human_quantity_activity_level }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">COD</th>
                                                <th scope="col">NIVEL DE ATIVIDADE</th>
                                                <th scope="col">RAÇA/COR</th>
                                                <th scope="col">Nº HOMEMS</th>
                                                <th scope="col">Nº MULHERES</th>
                                                <th scope="col">TOTAL</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                            {{-- perfil dos colaboradores  --}}
                            <div class="form-group col-md-12">
                                <h4>PEFIL/CENSO</h4>
                                <table class="table table-striped table-hover" id="tblProfileCollaborator">
                                    <thead>
                                        <tr>
                                            <th scope="col">RAÇA/COR</th>
                                            <th scope="col">Nº HOMEMS</th>
                                            <th scope="col">Nº MULHERES</th>
                                            <th scope="col">TOTAL DE PESSOAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profile as $item)
                                        <tr>
                                            <td>{{$item->color}}</td>
                                            <td>{{$item->max_human}}</td>
                                            <td>{{$item->max_woman}}</td>
                                            <td>{{$item->max_human + $item->max_woman}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">RAÇA/COR</th>
                                            <th scope="col">Nº HOMEMS</th>
                                            <th scope="col">Nº MULHERES</th>
                                            <th scope="col">TOTAL DE PESSOAS</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Final das questões -->
                        </div>
                    </div>
                </div>
                <!-- Campos de texto para descrever o plano de trabalho étnico racial -->
                <div class="tab-pane fade" id="plano_trabalho">
                    <div class="panel panel-default">
                        <div class="panel-heading">PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL APRESENTAÇÃO.</div>
                        <div class="panel-body">
                            <!-- Inicio do plano de trabalho -->
                            <div class="form-textarea">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Explicar brevemente do que trata o plano de
                                        trabalho, apresentar a organização e mencionar se já está sendo desenvolvido e
                                        os
                                        principais resultados alcançados.</label><br />
                                    <strong>Até 3000 caracteres. </strong>

                                    <textarea class="form-control class_textarea" id="action_plan" rows="3"
                                        name="action_plan">{{$instituion->action_plan}}
                                    </textarea>
                                </div>
                            </div>
                            <!-- Final do plano de trabalho -->
                        </div>
                    </div>
                </div>
                <!-- Campos de texto para descrever o cronograma -->
                <div class="tab-pane fade" id="cronograma">
                    <div class="panel panel-default">
                        <div class="panel-heading">CRONOGRAMA</div>
                        <div class="panel-body">
                            <!-- Inicio do cronograma -->
                            <h4>Cronograma (Data limite de entrega das atividades será
                                <strong>{{date('30/11/Y')}})</strong>
                            </h4>
                            <h4>Listar todas as atividades necessárias à realização do projeto.</h4>
                            <table class="table table-bordered table-striped" id="tbl_schedules">
                                <thead>
                                    <tr>
                                        <th scope="col">COD</th>
                                        <th scope="col">AÇÕES</th>
                                        <th scope="col">PESO</th>
                                        <th scope="col">ATIVIDADE</th>
                                        <th scope="col">QUANTIDADE</th>
                                        <th scope="col">DATA LIMITE</th>
                                        <th scope="col">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($instituion->schedules as $schedule)
                                    <tr>
                                        <th scope="row">{{$schedule->id}}</th>
                                        <td>{{$schedule->action->description}}</td>
                                        <td>{{$schedule->action->weight}}</td>
                                        <td>{{$schedule->activity}}</td>
                                        <td>{{$schedule->amount}}</td>
                                        <td>{{$schedule->deadline->format('d/m/Y')}}</td>
                                        <td>
                                            @if ($schedule->status == "Pendente")
                                                <span class="label label-warning">{{$schedule->status}}</span>
                                            @else
                                                <span class="label label-success">{{$schedule->status}}</span>  
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <h1>A Instituição ainda não enviou o seu cronograma.</h1>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Final do cronograma -->
                        </div>
                    </div>
                </div>
                <!-- Campos de texto para descrever as parceiras -->
                <div class="tab-pane fade" id="parceiras">
                    <div class="panel panel-default">
                        <div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
                        <div class="panel-body">
                            <!-- Inicio dos inpust -->
                            <h4>PARCEIRAS</h4>
                            <strong>
                                (Descrever as parcerias propostas e potenciais, enumerando os parceiros e suas
                                respectivas
                                responsabilidades/competências - o que caberá a cada um e/ou áreas das organizações
                                envolvidas -
                                bem como a natureza das contrapartidas e valor em reais – R$ se houver.)
                            </strong>
                            <strong>Até 2000 caracteres. </strong>
                            <div class="qtd_caracteres">
                                <strong>
                                    Tamanho: 2000
                                </strong>
                                <textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"
                                    name="partners">{{$instituion->partners}}
                                </textarea>
                            </div>
                            <!-- Final dos inputs -->
                        </div>
                    </div>
                </div>
                <!-- Campos de texto para descrever o METODOLOGIA -->
                <div class="tab-pane fade" id="metodologia">
                    <div class="panel panel-default">
                        <div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
                        <div class="panel-body">
                            <!-- Incio dos Inputs -->
                            <h4>METODOLOGIA</h4>
                            <strong>
                                (Descrever as estratégias a serem utilizadas na intervenção, as etapas do trabalho a
                                serem
                                desenvolvidas, os instrumentos, técnicas previstas e registros de sistematização a ser
                                utilizado, justificando e fundamentado a escolha adotada. Deve haver compatibilidade
                                entre o
                                público alvo do projeto - características do grupo - e a metodologia adotada, indicando
                                o
                                potencial do projeto para a sustentabilidade, para o desenvolvimento de lideranças e
                                para a
                                participação efetiva da comunidade no processo. O enfoque deve basear-se em metodologia
                                participativa, envolvendo a comunidade alvo, se couber).
                            </strong>
                            <strong>Até 7000 caracteres. </strong>
                            <div class="qtd_caracteres">
                                <strong>
                                    Tamanho: 7000
                                </strong>
                                <textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"
                                    name="methodology">{{$instituion->methodology}}
                                </textarea>
                            </div>
                            <!-- Final dos Inpust -->
                        </div>
                    </div>
                </div>
                <!--  Campos de texto para descrever resultados esperados -->
                <div class="tab-pane fade" id="resultados_esperados">
                    <div class="panel panel-default">
                        <div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL</div>
                        <div class="panel-body">
                            <!-- Inicio dos inputs -->
                            <h4>RESULTADOS ESPERADOS</h4>
                            <strong>
                                (Enumerar os resultados esperados após a execução do projeto. Explicitar os ganhos e
                                benefícios
                                auferidos pelo público-alvo e impactos mais imediatos constatados na realidade alvo da
                                intervenção. Descrever as mudanças pretendidas mais imediatas).
                            </strong>
                            <strong>Até 3000 caracteres. </strong>
                            <div class="qtd_caracteres">
                                <strong>
                                    Tamanho: 3000
                                </strong>
                                <textarea class="form-control class_textarea" id="textarea_plano_trabalho" rows="3"
                                    name="result">{{$instituion->result}}
                                </textarea>
                            </div>
                            <!-- Final dos Inputs -->
                        </div>
                    </div>
                </div>
                <!-- Campos para listagem de documentos -->
                <div class="tab-pane fade" id="documento">
                    <div class="panel panel-default">
                        <div class="panel-heading">DOCUMENTOS</div>
                        <div class="panel-body">
                            <h4>Documentos da Instituição</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">COD</th>
                                        <th scope="col">Data de Envio</th>
                                        <th scope="col">Descrição do documento</th>
                                        <th scope="col">Ver Documento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instituion->documents as $document)
                                    <tr>
                                        <th scope="row">{{ $document->id }}</th>
                                        <td>{{ $document->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $document->description }}</td>
                                        <td>
                                            <a href="{{ route('home.document.show',$document->doc_name) }}" class="btn btn-info btn-sm" role="button"
                                                target="_blank">
                                                <span class="glyphicon glyphicon-folder-open"></span> Documento
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                            <div align="center">
                                <a href="{{route('home')}}" class="btn btn-success btn-lg" role="button"
                                    aria-pressed="true">
                                    Voltar ao Menu
                                </a>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
@section('css')
<link rel="stylesheet" href="{{asset('assets/home/css/style.css')}}">
@stop

@section('js')
<script src="{{asset('assets/home/show_institution_details.js')}}"></script>
@stop
@stop