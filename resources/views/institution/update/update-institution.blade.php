@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">

@section('body_class')

@section('body')
<div class="container">
    @include('layouts.nav-bar-institution')

    <form method="POST" id="formUpdate">
        @csrf
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active_tab1" style="border:1px solid #ccc"
                    id="list_instituicao_detalhes">Indentificação
                    da Instituição</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive_tab1" id="list_plano_trabalho_etnico" style="border:1px solid #ccc">Plano de
                    Trabalho</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive_tab1" id="list_parceiras" style="border:1px solid #ccc">Parceiras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive_tab1" id="list_metodologia" style="border:1px solid #ccc">Metodologia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive_tab1" id="list_resultados_esperados"
                    style="border:1px solid #ccc">Resultados
                    Esperados</a>
            </li>
        </ul>

        @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $erro)
                <li>{{$erro}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- Messagem para validação de cnpj --}}
        @if(session('error-cnpj'))
        <div class="alert alert-danger">
            {{ session('error-cnpj') }}
        </div>
        @endif
        {{-- Messagem para Data  Limite--}}
        @if(session('error-deadline'))
        <div class="alert alert-danger">
            {{ session('error-deadline') }}
        </div>
        @endif
        <!-- Campos de texto para descrever a instituição -->
        <div class="tab-content" style="margin-top:16px; ">
            <div class="tab-pane active" id="instituicao_detalhes">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> IDENTIFICAÇÃO DA INSTITUIÇÃO</strong>
                        <div class="legends-forms">
                            <strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
                                class="asterisco-input-ogrigatorio">*</small>
                            <strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Inicio dos Inputs da Instituição-->
                        <input type="hidden" name="etapas" value="" id="etapas">
                        <input type="hidden" name="id" value="{{$institutions->id}}" id="id">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name">Nome da Instituição proponente <small
                                        class="asterisco-input">*</small>
                                </label>
                                <input type="text" class="form-control " name="name" id="name"
                                    value="{{$institutions->name}}">
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="fantasy_name">Nome para certificação (nome fantasia) <small
                                        class="asterisco-input">*</small> </label>
                                <input type="text" class="form-control" id="fantasy_name"
                                    value="{{$institutions->fantasy_name}}" name="fantasy_name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="company_classification">Classificação da Empresa <small
                                        class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" id="company_classification"
                                    name="company_classification">
                                    @foreach ($companyClassifications as $classification)
                                    <option value="{{ $classification->id }}" @if ($institutions->company_classification
                                        == $classification->id)
                                        selected
                                        @endif
                                        >{{  $classification->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cnpj">CNPJ <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="cnpj" value="{{$institutions->cnpj}}"
                                    name="cnpj" readonly="readonly">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="county">Município <small class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="county">
                                    <option value="{{$institutions->county}}" selected> {{$institutions->county}}
                                    </option>
                                    <option value="Camaçari">Camaçari</option>
                                    <option value="Candeias">Candeias</option>
                                    <option value="Lauro de Freitas">Lauro de Freitas</option>
                                    <option value="Salvador">Salvador</option>
                                    <option value="Simões Filho">Simões Filho</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="uf">UF:</label>
                                <input type="text" class="form-control" id="uf" value="{{ $institutions->uf }}"
                                    name="uf" readonly="readonly">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address">Endereço <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="address" value="{{$institutions->address}}"
                                    name="address">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email">E-mail <small class="asterisco-input">*(Deve ser usado como seu
                                        Login)</small></label>
                                <input type="email" class="form-control" id="email" value="{{$institutions->email}}"
                                    name="email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone">Telefone <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="phone" value="{{$institutions->phone}}"
                                    name="phone">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="technical_manager">Responsável técnico <small
                                        class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="technical_manager"
                                    value="{{$institutions->technical_manager}}" name="technical_manager">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="formation">Formação <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="formation" placeholder="Formação:"
                                    value="{{$institutions->formation}}" name="formation">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="phone_two">Telefone <small class="asterisco-input">*</small></label>
                                <input type="text" class="form-control" id="phone_two" placeholder="Telefone:"
                                    value="{{$institutions->phone_two}}" name="phone_two">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email_two">Atividade <small class="asterisco-input">*</small></label>
                                <select class="form-control form-control-sm" name="institution_activity">
                                    <option value="{{$institutions->institution_activity}}">
                                        {{$institutions->institution_activity}}</option>
                                    <option value="Indústria">Indústria</option>
                                    <option value="Comércio">Comércio</option>
                                    <option value="Serviços">Serviços</option>
                                </select>
                            </div>
                            <div align="center">
                                <button type="button" name="btn_indentificacao" id="btn_indentificacao"
                                    class="btn btn-info btn-lg"
                                    data-url="{{route('update.institution')}}">Proximo</button>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Campos de texto para descrever o plano de trabalho étnico racial -->
            <div class="tab-pane fade" id="plano_trabalho">
                <div class="panel panel-default">
                    <div class="panel-heading">PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL APRESENTAÇÃO.
                        <div class="legends-forms">
                            <strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
                                class="asterisco-input-ogrigatorio">*</small>
                            <strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Inicio do plano de trabalho -->
                        <h4>PLANO DE TRABALHO<small class="asterisco-input">*</small></h4>
                        <div class="form-textarea">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Explicar brevemente do que trata o plano de
                                    trabalho, apresentar a organização e mencionar se já está sendo desenvolvido e os
                                    principais resultados alcançados.
                                </label><br />
                                <strong>Até 3000 caracteres. <small class="asterisco-input">*</small> </strong>
                                <div class="qtd_caracteres">
                                    <strong>
                                        <p><small class="caracteres"></small></p>
                                    </strong>
                                </div>
                                <textarea class="form-control class_textarea" id="action_plan" rows="3"
                                    name="action_plan">{{$institutions->action_plan}}</textarea>
                            </div>
                        </div>
                        <!-- Final do plano de trabalho -->
                        <br />
                        <div align="center">
                            <button type="button" name="previous_btn_personal_details" id="btn_previous_plano_trabalho"
                                class="btn btn-default btn-lg">Anterior</button>
                            <button type="button" name="btn_instituicacao_next" id="btn_plano_trabalho_next"
                                class="btn btn-info btn-lg" data-url="{{route('update.institution')}}">Proximo</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>

            <!-- Campos de texto para descrever as parceiras -->
            <div class="tab-pane fade" id="parceiras">
                <div class="panel panel-default">
                    <div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL
                        <div class="legends-forms">
                            <strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
                                class="asterisco-input-ogrigatorio">*</small>
                            <strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Inicio dos inpust -->
                        <h4>PARCERIAS<small class="asterisco-input">*</small></h4>
                        <strong>
                            (Descrever as parcerias propostas e potenciais, enumerando os parceiros e suas respectivas
                            responsabilidades/competências - o que caberá a cada um e/ou áreas das organizações
                            envolvidas -
                            bem como a natureza das contrapartidas e valor em reais – R$ se houver.)
                        </strong>
                        <strong>Até 2000 caracteres. </strong>
                        <div class="qtd_caracteres">
                            <strong>
                                <p><small class="caracteres_partners"></small></p>
                            </strong>
                            <textarea class="form-control class_textarea" id="partners" rows="3"
                                name="partners">{{$institutions->partners}}</textarea>
                        </div>
                        <!-- Final dos inputs -->
                        <br />
                        <div align="center">
                            <button type="button" name="btn_previous_parceiras" id="btn_previous_parceiras"
                                class="btn btn-default btn-lg">Anterior</button>
                            <button type="button" name="btn_next_parceiras" id="btn_next_parceiras"
                                class="btn btn-info btn-lg" data-url="{{route('update.institution')}}">Proximo</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <!-- Campos de texto para descrever o METODOLOGIA -->
            <div class="tab-pane fade" id="metodologia">
                <div class="panel panel-default">
                    <div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL
                        <div class="legends-forms">
                            <strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
                                class="asterisco-input-ogrigatorio">*</small>
                            <strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Incio dos Inputs -->
                        <h4>METODOLOGIA<small class="asterisco-input-options">*</small></h4>
                        <strong>
                            (Descrever as estratégias a serem utilizadas na intervenção, as etapas do trabalho a serem
                            desenvolvidas, os instrumentos, técnicas previstas e registros de sistematização a ser
                            utilizado, justificando e fundamentado a escolha adotada. Deve haver compatibilidade entre o
                            público alvo do projeto - características do grupo - e a metodologia adotada, indicando o
                            potencial do projeto para a sustentabilidade, para o desenvolvimento de lideranças e para a
                            participação efetiva da comunidade no processo. O enfoque deve basear-se em metodologia
                            participativa, envolvendo a comunidade alvo, se couber).
                        </strong>
                        <strong>Até 7000 caracteres. </strong>
                        <div class="qtd_caracteres">
                            <strong>
                                <p><small class="methodology_caracteres"></small></p>
                            </strong>
                            <textarea class="form-control class_textarea" id="methodology" rows="3"
                                name="methodology">{{$institutions->methodology}}</textarea>
                        </div>
                        <!-- Final dos Inpust -->
                        <br />
                        <div align="center">
                            <button type="button" name="btn_previous_parceiras" id="btn_metodologia_previous"
                                class="btn btn-default btn-lg">Anterior</button>
                            <button type="button" name="btn_contact_details" id="btn_metodologia_next"
                                class="btn btn-info btn-lg">Proximo</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <!--  Campos de texto para descrever resultados esperados -->
            <div class="tab-pane fade" id="resultados_esperados">
                <div class="panel panel-default">
                    <div class="panel-heading"> PLANO DE TRABALHO DE DIVERSIDADE ÉTNICO-RACIAL
                        <div class="legends-forms">
                            <strong>LEGENDA DO FORMULÁRIO: Campos obrigatórios </strong><small
                                class="asterisco-input-ogrigatorio">*</small>
                            <strong> Campos Opicionais</strong> <small class="asterisco-input-options">*</small>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Inicio dos inputs -->
                        <h4>RESULTADOS ESPERADOS<small class="asterisco-input-options">*</small></h4>
                        <strong>
                            (Enumerar os resultados esperados após a execução do projeto. Explicitar os ganhos e
                            benefícios
                            auferidos pelo público-alvo e impactos mais imediatos constatados na realidade alvo da
                            intervenção. Descrever as mudanças pretendidas mais imediatas).
                        </strong>
                        <strong>Até 3000 caracteres. </strong>
                        <div class="qtd_caracteres">
                            <strong>
                                <p><small class="caracteres_result"></small></p>
                            </strong>
                            <textarea class="form-control class_textarea" id="result" rows="3"
                                name="result">{{$institutions->result}}</textarea>
                        </div>
                        <!-- Final dos Inputs -->
                        <br />
                        <div align="center">
                            <button type="button" name="btn_previous_parceiras" id="btn_resultados_previous"
                                class="btn btn-default btn-lg">Anterior</button>
                            <button type="button" name="btn_resultados_next" id="btn_resultados_next"
                                class="btn btn-success btn-lg" data-url="{{route('update.institution')}}">Atualizar
                                Informações</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
</div>
</form>

{{-- Modal para messagem de campos invalidos --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalErrorCad">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Atenção: Há campos invalidos!</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" style="display: none; " id="danger">
                    <ul></ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal para carregar messagem ao salvar Institução --}}
<div class="modal" tabindex="-1" role="dialog" id="loadUpdateInstitution">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atualizando</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>Aguarde...</h1>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> --}}
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('adminlte_js')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/institution/mask.js') }}"></script>
<script src="{{asset('assets/institution/update/institution-update.js')}}"></script>
@stop