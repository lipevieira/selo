<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Question;
use App\Models\ScheduleAction;
use Illuminate\Http\Request;
use App\Http\Requests\Institution\InstitutionFormRequest;
use App\Http\Requests\Institution\MembresFormRequest;
use Carbon\Carbon;

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
        // $validacaoMembrosComissao = new MembresFormRequest(); 
        // $validacaoInstiuicao = new InstitutionFormRequest();
        $dataForm = $request->except('_token');
        // $this->validate($request, $validacaoInstiuicao->rules(), $validacaoInstiuicao->messages());
        // $this->validate($request, $validacaoMembrosComissao->rules(), $validacaoMembrosComissao->messages());
        // dd($dataForm);
        if ($this->validateCnpj($request->cnpj) == false) {
            echo "CNPJ Invalido";
            return redirect()
                ->back()
                ->with('error-cnpj', 'Erro CNPJ Inválido')
                ->withInput();
        }
        if ($this->validateDeadline($request->deadline) == false) {
            return redirect()
                ->back()
                ->with('error-deadline', 'Erro Data Limte não deve ser maior que o dia 30 de novembro')
                ->withInput();
        }



        $institution = Institution::create($dataForm);
        // Salvado os três membros da instituição
        for ($i = 0; $i < 3; $i++) {
            $institution->commissionMembers()->create([
                'members_name' => $request->members_name[$i],
                'members_function' => $request->members_function[$i],
                'members_phone' => $request->members_phone[$i],
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
        // // Salvado O nivel de atividade dos colaboradores
        for ($i=0; $i < count($request->activity_level); $i++) {
            $institution->collaboratorActivityLevels()->create([
                'activity_level' => $request->activity_level[$i],
                'color' => $request->color[$i],
                'human_quantity_activity_level' => $request->human_quantity_activity_level[$i],
                'woman_quantity_activity_level' => $request->woman_quantity_activity_level[$i],
            ]);
        }
        // // Salvado os perfis dos colaboradores
        for ($i=0; $i < 2; $i++) {
            $institution->profileCollaborators()->create([
                'profile_color' => $request->profile_color[$i],
                'human_quantity' => $request->human_quantity[$i],
                'woman_quantity' => $request->woman_quantity[$i],
            ]);
        }
        // // Salvando o cronograma da instituição
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
    private function validateDeadline($dataForm = array())
    {
        $now = new Carbon();
        $ano = $now->year;
        $mes = 11;
        $dia = 29;
        $deadlineValidate = Carbon::createFromDate($ano, $mes, $dia);
        $valida = true;

        foreach ($dataForm as $value) {
            if ($value > $deadlineValidate) {
                $valida = false;
            }
        }
        return $valida;
    }
    private function validateCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{
            12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{
        13} == ($resto < 2 ? 0 : 11 - $resto);
    }
}
