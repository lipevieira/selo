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

        //Salvando uma instituição com seus membros
        $institution = new Institution();
        // dd($dataForm);
        
        $institution = Institution::create($dataForm);
        // $institution->commissionMembers()->attach(\App\Models\CommissionMembers::create($dataForm)->id);  

        $institution->commissionMembers()->insert([
            'members_name' => $dataForm['members_name'],
            'members_function' => $dataForm['members_function'],
            'phone_members_commission' => $dataForm['phone_members_commission'],
            'members_email' => $dataForm['members_email'],
        ])->id;
        

        // $levelActivity =    $institution->CollaboratorActivityLevels()->create($dataForm);
        // $perfilColaborators = $institution->profileCollaborators()->create($dataForm);
        // $brances = $institution->branches()->create($dataForm);
        // $shedule = $institution->schedules()->create($dataForm);

        // $institution->alternatives()->sync($dataForm);

        return redirect()->route('index.company')
            ->with('success', 'Instituição salva com sucesso!');
    }
}
