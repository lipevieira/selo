<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Question;
use App\Models\ScheduleAction;
use App\Models\Client;
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

        return view('institution.register.register', compact('questionAlternatives', 'actions'));
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

    public function saveAllInstutition(Request $request)
    {
        $validacaoInstiuicao = new InstitutionFormRequest();
        $dataForm = $request->except('_token');

        switch ($dataForm['etapas']) {
            case 1:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rules(), $validacaoInstiuicao->messages());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                //validando membros da comissão
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesMembers(), $validacaoInstiuicao->messageMembers());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                // Validando o cnpj
                if ($this->institution->validateCnpj($dataForm['cnpj']) == false) {
                    $validator = ['errors' => 'O campo CNPJ é Invalido, por favor corrija.',];
                    return response()->json(['errors' => $validator]);
                }
                // Validando cnps adcionais
                for ($i = 0; $i < count($request->cnpj_additional); $i++) {
                    if ($request->cnpj_additional[$i] != null) {
                        if ($this->institution->validateCnpj($request->cnpj_additional[$i]) == false) {
                            $validator = ['errors' => 'O campo CNPJ Adicional é Invalido, por favor corrija.',];
                            return response()->json(['errors' => $validator]);
                        }
                    }
                }
                break;
            case 2:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesDiagnosticoCencitario(), $validacaoInstiuicao->messagesDiagnosticoCencitario());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;
            case 3:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesPlainAction(), $validacaoInstiuicao->messagesPlainAction());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;
            case 4:
                for ($i = 0; $i < count($request->schedule_action_id); $i++) {
                    if ($request->schedule_action_id[$i] != null || $request->activity[$i] || $request->amount[$i] || $request->deadline[$i]) {
                        $validator  = Validator::make($dataForm,  $validacaoInstiuicao->rulesSchedule(), $validacaoInstiuicao->messagesSchedule());
                        if ($validator->fails()) {
                            return response()->json(['errors' => $validator->errors()->all()]);
                        }
                    }
                }
                // Validando a Data Limte
                if ($this->schedule->validateDeadline($request->deadline) == false) {
                    $validator = ['errors' => 'Não é permitido uma data maior ou igual ao dia 30 de novembro',];
                    return response()->json(['errors' => $validator]);
                }
                break;
            case 5:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesPartners(), $validacaoInstiuicao->messagesPartners());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;
            case 6:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesMethodology(), $validacaoInstiuicao->messageMethodology());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
                break;
            case 7:
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesResult(), $validacaoInstiuicao->messageResul());
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                } else {
                    // INICIALIZAÇÃO DE CADASTROS 
                    // $institution = Institution::create($dataForm);
                    $institution = $this->institution->create($dataForm);

                    $transctionMembers = true;
                    $transctionCnpj = true;
                    $transctionAnswers = true;
                    $transctionCollaboratorActivityLevels = true;
                    $transctionSchedules = true;
                    $autentication = true;
                    //Salvando a autenticação da Instituição
                    $autentication = $institution->client()->create([
                        'name'  =>    $institution->name,
                        'email'  =>    $institution->email,
                        'password'  =>  bcrypt($institution->cnpj),
                        'institution_id'  =>   $institution->id,
                    ]);
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
                        && $transctionSchedules && $transctionCnpj && $autentication
                    ) {
                        DB::commit();
                        //TO-DE Fazer: notificação após salvar uma Instituição
                        // $institutionRegisted = $institution;
                        // $institutionRegisted->notify(new InstitutionRegistered($institution));
                    } else {
                        DB::rollBack();
                    }
                }
                break;
            default:
                $validator = [
                    'errors' => 'Numero de Etapa do formulario Invalida!',
                ];
                return response()->json(['errors' => $validator]);
                break;
        }
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
                } else {
                    unset($dataForm['uf']);
                    unset($dataForm['cnpj']);
                    $institution = $this->institution->find($dataForm['id']);
                    $institution->update($dataForm);
                    $this->updateClient($dataForm);
                }
                break;

            default:
                # code...
                break;
        }
    }
    /**
     * Atualizando o login da Instituição
     *
     * @param array $dataForm
     * @return void
     */
    private function updateClient($dataForm = [])
    {
        $client = Client::find(auth()->guard('client')->user()->id);
        $client->update([
            'name'  =>  $dataForm['name'],
            'email'  =>  $dataForm['email'],
        ]);

        if($client == true){
            return true;
        }else{
            return false;
        }
    }
}
