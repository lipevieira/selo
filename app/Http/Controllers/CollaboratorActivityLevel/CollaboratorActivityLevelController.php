<?php

namespace App\Http\Controllers\CollaboratorActivityLevel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CollaboratorActivityLevel;
use Illuminate\Support\Facades\Validator;


class CollaboratorActivityLevelController extends Controller
{

    private $collaboratorActivityLevel;

    public function __construct(CollaboratorActivityLevel $collaboratorActivityLevel)
    {
        $this->collaboratorActivityLevel = $collaboratorActivityLevel;
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
