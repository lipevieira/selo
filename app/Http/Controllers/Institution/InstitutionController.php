<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\ScheduleAction;
use App\Models\Institution;

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
    public function saveAllInstutition(Request $request)
    {
        $dataForm = $request->except('_token');
        $cnpjAdd = $request->cnpj_additional;
        $institution = new Institution();

        $institution = Institution::create($dataForm);
        $counteArrayMembrers = count($request->members_name);
        // Salvado os três membros da instituição
        for ($i = 0; $i < 3; $i++) {
            $institution->commissionMembers()->create([
                'members_name' => $request->members_name[$i],
                'members_function' =>  $request->members_function[$i],
                'members_phone' =>  $request->phone_members_commission[$i],
                'members_email' =>  $request->members_email[$i],
            ]);
        }
        // Verificação para salvar outros CNPJs caso seja enviado.
        if (!empty($cnpjAdd)) {
            $counteArrayCnpj = count($request->cnpj_additional);
            for ($i = 0; $i < $counteArrayCnpj; $i++) {
                $institution->branches()->create([
                    'cnpj_additional' => $request->cnpj_additional[$i],
                ]);
            }
        }
        //Salvado o Diagnóstico Censitário.
        $counteArrayDiagnosticoCensitario = count($request->alternative_id);
        $array = '';

        for ($i = 0; $i < $counteArrayDiagnosticoCensitario; $i++) {
            $institution->answers()->create([
                'alternative_id' => $request->alternative_id[$i],
                'others' => !empty($request->others[$i]) ? $request->others[$i] : $array,
            ]);
        }

        // $levelActivity =    $institution->CollaboratorActivityLevels()->create($dataForm);
        // $perfilColaborators = $institution->profileCollaborators()->create($dataForm);
        // $brances = $institution->branches()->create($dataForm);
        // $shedule = $institution->schedules()->create($dataForm);

        // $institution->alternatives()->sync($dataForm);

        return redirect()->route('index.company')
            ->with('success', 'Instituição salva com sucesso!');
    }
}
