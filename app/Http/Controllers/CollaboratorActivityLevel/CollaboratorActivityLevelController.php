<?php

namespace App\Http\Controllers\CollaboratorActivityLevel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CollaboratorActivityLevel;
use Illuminate\Support\Facades\Validator;
use App\Models\Institution;
use App\Models\Question;


class CollaboratorActivityLevelController extends Controller
{

    private $collaboratorActivityLevel;
    private $institution;

    public function __construct(CollaboratorActivityLevel $collaboratorActivityLevel, Institution $institution)
    {
        $this->collaboratorActivityLevel = $collaboratorActivityLevel;
        $this->institution = $institution;
    }
    /**
     * Undocumented function
     *
     * @return Institution
     * @return Question
     * @return CollaboratorActivityLevel
     */
    public function index()
    {
        $id = auth()->guard('client')->user()->id;
        $institutions = $this->institution->find($id);
        $questionAlternatives = Question::with('alternatives')->get();

        return view('institution.update.diagnostico-censitario', compact('questionAlternatives', 'institutions'));
    }
    /***
     * @return CollaboratorActivityLevel
     */
    public function getDiagnosticoCensitarioEdit(Request $request)
    {
        $id = $request->id;
        $diagnosticoCensitario = $this->collaboratorActivityLevel->find($id);

        return response()->json($diagnosticoCensitario);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:collaborator_activity_levels',
            'activity_level' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('auth.get.diagnostico.censitario')
                ->withErrors($validator)
                ->withInput();
        } else {
            $dataForm = $request->except('_token');
            $id = $request->id;

            $profileCollaborators = $this->collaboratorActivityLevel->find($id);
            $profileCollaborators->update($dataForm);

            return redirect()->route('auth.get.diagnostico.censitario')->with('success', 'Nivel de atividade dos colaboradores editado com sucesso');
        }
    }
   
}
