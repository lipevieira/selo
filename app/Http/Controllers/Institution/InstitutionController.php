<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Question;
use App\Models\ScheduleAction;
use Illuminate\Http\Request;
use App\Http\Requests\Institution\InstitutionFormRequest;
use DB;
use \Validator;
use Response;
use App\Models\Schedule;

class InstitutionController extends Controller
{
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
                $validator  = Validator::make($dataForm, $validacaoInstiuicao->rulesShedule(), $validacaoInstiuicao->messagesShedule());
                if ($validator->fails()) {
                    return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                    ));
                }
                // Validando a Data Limte
                if ($schedule->validateDeadline($request->deadline) == false) {
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
                }else{
                    // INICIALIZAÇÃO DE CADASTROS 
                    $institution = Institution::create($dataForm);
                    $transctionMembers = false;
                    $transctionCnpj = false;
                    $transctionAnswers = false;
                    $transctionCollaboratorActivityLevels = false;
                    $transctionProfileCollaborators = false;
                    $transctionSchedules = false;
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
                    // // Salvado os perfis dos colaboradores
                    for ($i = 0; $i < 2; $i++) {
                        $transctionProfileCollaborators = $institution->profileCollaborators()->create([
                            'profile_color' => $request->profile_color[$i],
                            'human_quantity' => $request->human_quantity[$i],
                            'woman_quantity' => $request->woman_quantity[$i],
                        ]);
                    }
                    // // Salvando o cronograma da instituição
                    for ($i = 0; $i < count($request->action); $i++) {
                        $transctionSchedules = $institution->schedules()->create([
                            'action' => $request->action[$i],
                            // 'authorization' => $request->authorization[$i],
                            'activity' => $request->activity[$i],
                            'amount' => $request->amount[$i],
                            'deadline' => $request->deadline[$i],
                        ]);
                    }
                    if ($institution && $transctionMembers && $transctionAnswers  && $transctionCollaboratorActivityLevels && $transctionProfileCollaborators && $transctionSchedules) {
                        DB::commit();
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
 
}
