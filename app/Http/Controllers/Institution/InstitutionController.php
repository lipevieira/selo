<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Question;
use App\Models\ScheduleAction;
use App\Models\CommissionMembers;
use Illuminate\Http\Request;
use App\Http\Requests\Institution\InstitutionFormRequest;
use DB;
use \Validator;
use Response;
use App\Models\Schedule;
use App\Notifications\InstitutionRegistered;

class InstitutionController extends Controller
{
    private $institution;
    private $schedule;

    public function __construct(Institution $institution, Schedule $schedule)
    {
        $this->institution = $institution;
        $this->schedule = $schedule;
    }
    public function index()
    {
        $actions = ScheduleAction::all();
        $questionAlternatives = Question::with('alternatives')->get();

        return view('institution.index', compact('questionAlternatives', 'actions'));
    }
    public function welcome()
    {
        return view('welcome');
    }
    /**
     * Carregando uma de questionario para fazer 
     * cadastro de instituiçoes
     *
     * @return void
     */
    public function start()
    {
        return view('institution.register.start');
    }

    public function saveAllInstutition(Request $request, Schedule $schedule, Institution $institution)
    {
        $validacaoInstiuicao = new InstitutionFormRequest();
        $dataForm = $request->except('_token');

        switch ($dataForm['etapas']) {
            case 1:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rules(), $validacaoInstiuicao->messages());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                //validando membros da comissão
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesMembers(), $validacaoInstiuicao->messageMembers());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                // Validando o cnpj
                if ($institution->validateCnpj($dataForm['cnpj']) == false) {
                    $validator = [
                        'errors' => 'CNPJ Invalido, por favor corrija.',
                    ];
                    return Response::json(array(
                        'errors' => $validator,
                    ));
                }
                // Validando cnps adcionais
                for ($i = 0; $i < count($request->cnpj_additional); $i++) {
                    if ($request->cnpj_additional[$i] != null) {
                        if ($institution->validateCnpj($request->cnpj_additional[$i]) == false) {
                            $validator = [
                                'errors' => 'O campo CNPJ  adcional é invalido, por favor corrija.',
                            ];
                            return Response::json(array(
                                'errors' => $validator,
                            ));
                        }
                    }
                }
                // Verificando se existe CNPJ e E-mail na table de institutições
                $queryInstitutionEmail = Institution::where('email', '=', $dataForm['email'])->first();
                $queryInstitutionCnpj = Institution::where('cnpj', '=', $dataForm['cnpj'])->first();
                $queryMembrersComissionEmail = CommissionMembers::where('members_email', '=', $dataForm['members_email'])->first();

                if ($queryInstitutionEmail == true) {
                    $validator = [
                        'errors' => 'O E-mail para essa instiuição já está cadastrado. Por favor informe um e-mail diferente',
                    ];
                    return Response::json(array(
                        'errors' => $validator,
                    ));
                }
                if ($queryInstitutionCnpj == true) {
                    $validator = [
                        'errors' => 'Esse CNPJ já está cadastrado. Por Favor acesse a pagina de login de Instituições',
                    ];
                    return Response::json(array(
                        'errors' => $validator,
                    ));
                }
                if ($queryMembrersComissionEmail == true) {
                    $validator = [
                        'errors' => 'O E-mail do Membros da comissão já esta cadastrando. Por favor informe um e-mail diferente',
                    ];
                    return Response::json(array(
                        'errors' => $validator,
                    ));
                }
                break;
            case 2:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesDiagnosticoCencitario(), $validacaoInstiuicao->messagesDiagnosticoCencitario());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                break;
            case 3:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesPlainAction(), $validacaoInstiuicao->messagesPlainAction());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                break;
            case 4:
                // Validando a Data Limte
                if ($schedule->validateDeadline($request->deadline) == false) {
                    // dd($request->schedule_action_id);
                    $validator = [
                        'errors' => 'Não é permitido uma data maior ou igual ao dia 30 de novembro',
                    ];
                    return Response::json(array(
                        'errors' => $validator,
                    ));
                }
                break;
            case 5:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesPartners(), $validacaoInstiuicao->messagesPartners());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                break;
            case 6:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesMethodology(), $validacaoInstiuicao->messageMethodology());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                break;
            case 7:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesResult(), $validacaoInstiuicao->messageResul());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                } else {
                    // INICIALIZAÇÃO DE CADASTROS 
                    $institution = Institution::create($dataForm);
                    $transctionMembers = true;
                    $transctionCnpj = true;
                    $transctionAnswers = true;
                    $transctionCollaboratorActivityLevels = true;
                    $transctionSchedules = true;
                    // Salvado os três membros da instituição
                    for ($i = 0; $i < 3; $i++) {
                        $transctionMembers = $institution->commissionMembers()->create([
                            'members_name' => $request->members_name[$i],
                            'members_function' => $request->members_function[$i],
                            'members_phone' => $request->members_phone[$i],
                            'members_email' => $request->members_email[$i],
                        ]);
                    }
                    // // Verificação para salvar outros CNPJs caso seja enviado.
                    for ($i = 0; $i < count($request->cnpj_additional); $i++) {
                        if ($request->cnpj_additional[$i] != null) {
                            $transctionCnpj = $institution->branches()->create([
                                'cnpj_additional' => $request->cnpj_additional[$i],
                            ]);
                        }
                    }
                    // //Salvado o Diagnóstico Censitário.
                    for ($i = 0; $i < count($request->alternative_id); $i++) {
                        $transctionAnswers = $institution->answers()->create([
                            'alternative_id' => $request->alternative_id[$i],
                            'others' => $request->others[$i],
                        ]);
                    }
                    // // Salvado O nivel de atividade dos colaboradores
                    for ($i = 0; $i < count($request->activity_level); $i++) {
                        $transctionCollaboratorActivityLevels = $institution->collaboratorActivityLevels()->create([
                            'activity_level' => $request->activity_level[$i],
                            'color' => $request->color[$i],
                            'human_quantity_activity_level' => $request->human_quantity_activity_level[$i],
                            'woman_quantity_activity_level' => $request->woman_quantity_activity_level[$i],
                        ]);
                    }
                    // Salvando o cronograma da instituição
                    for ($i = 0; $i < count($request->schedule_action_id); $i++) {
                        if ($request->schedule_action_id[$i] != null && $request->activity && $request->amount && $request->deadline) {
                            $transctionSchedules = $institution->schedules()->create([
                                'schedule_action_id' => $request->schedule_action_id[$i],
                                'activity' => $request->activity[$i],
                                'amount' => $request->amount[$i],
                                'deadline' => $request->deadline[$i],
                            ]);
                        }
                    }
                    if (
                        $institution && $transctionMembers && $transctionAnswers  && $transctionCollaboratorActivityLevels
                        && $transctionSchedules && $transctionCnpj
                    ) {
                        DB::commit();
                        $institutionRegisted = $institution;
                        $institutionRegisted->notify(new InstitutionRegistered($institution));
                    } else {
                        DB::rollBack();
                    }
                }
                break;
            default:
                $validator = [
                    'errors' => 'Numero de Etapa do formulario Invalida!',
                ];
                return Response::json(array(
                    'errors' => $validator,
                ));
                break;
        }
    }
   
    public function auth(Request $request, Institution $institution)
    {
        // $institutions = $institution->find(1);
        

        return view('institution.update.update-institution', compact('institutions'));
    }
    /**
     * Atualizando uma Instituição com seus derivados
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $dataForm = $request->except('_token');

        switch ($dataForm['etapas']) {
            case 1:
                $validator  = Validator::make($request->all(), $this->institution->rules($request['id']), $this->institution->messages());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;
            case 2:
                $validator  = Validator::make($request->all(), $this->institution->rulesPlainAction(), $this->institution->messagesPlainAction());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;
            case 3:
                $validator  = Validator::make($dataForm, $this->institution->rulesPartners(), $this->institution->messagesPartners());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;    
            case 4:
                $validator  = Validator::make($dataForm, $this->institution->rulesResult(), $this->institution->messageResul());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }else{
                    $institution = $this->institution->find($dataForm['id']);
                    $institution->update($dataForm);
                }
                break;    

            default:
                # code...
                break;
        }
    }
}
