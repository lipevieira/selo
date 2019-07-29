<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Question;
use App\Models\ScheduleAction;
use Illuminate\Http\Request;
use App\Http\Requests\Institution\InstitutionFormRequest;

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

    public function saveAllInstutition(InstitutionFormRequest $request)
    {
        $dataForm = $request->except('_token');
        // dd($dataForm);
        $institution = Institution::create($dataForm);
        // Salvado os três membros da instituição
        for ($i = 0; $i < 3; $i++) {
            $institution->commissionMembers()->create([
                'members_name' => $request->members_name[$i],
                'members_function' => $request->members_function[$i],
                'members_phone' => $request->phone_members_commission[$i],
                'members_email' => $request->members_email[$i],
            ]);
        }
        // // Verificação para salvar outros CNPJs caso seja enviado.
        for ($i = 0; $i < count($request->cnpj_additional); $i++) {
            if ($request->cnpj_additional[$i] != null) {
                $institution->branches()->create([
                    'cnpj_additional' => $request->cnpj_additional[$i],
                ]);
            }
        }
        // //Salvado o Diagnóstico Censitário.
        for ($i = 0; $i < count($request->alternative_id); $i++) {
            $institution->answers()->create([
                'alternative_id' => $request->alternative_id[$i],
                'others' => $request->others[$i],
            ]);
        }
        // Salvado O nivel de atividade dos colaboradores
        for ($i=0; $i < count($request->activity_level); $i++) {
            $institution->collaboratorActivityLevels()->create([
                'activity_level' => $request->activity_level[$i],
                'color' => $request->color[$i],
                'human_quantity_activity_level' => $request->human_quantity_activity_level[$i],
                'woman_quantity_activity_level' => $request->woman_quantity_activity_level[$i],
            ]);
        }
        // Salvado os perfis dos colaboradores
        for ($i=0; $i < 2; $i++) {
            $institution->profileCollaborators()->create([
                'profile_color' => $request->profile_color[$i],
                'human_quantity' => $request->human_quantity[$i],
                'woman_quantity' => $request->woman_quantity[$i],
            ]);
        }
        // Salvando o cronograma da instituição
        for ($i = 0; $i < count($request->action); $i++) {
            $institution->schedules()->create([
                'action' => $request->action[$i],
                // 'authorization' => $request->authorization[$i],
                'activity' => $request->activity[$i],
                'amount' => $request->amount[$i],
                'deadline' => $request->deadline[$i],
            ]);
        }
        return redirect()->route('index.company')
            ->with('success', 'Instituição salva com sucesso!');
    }
}
