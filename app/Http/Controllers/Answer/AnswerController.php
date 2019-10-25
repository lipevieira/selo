<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;


class AnswerController extends Controller
{
    private $answer;
    private  $diagnosis = true;
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }
    public function update(Request $request)
    {
        for ($i = 0; $i < count($request->alternative_id); $i++) {
            $this->diagnosis = $this->answer->find($request->id[$i]);
            $this->diagnosis->update([
                'alternative_id' => $request->alternative_id[$i],
                'others'    => $request->others[$i],
            ]);
        }
        if ($this->diagnosis)
            return \redirect()->back()->with('success', 'Diagnostico Censitário Atualizado com Sucesso');
        else
            return \redirect()->back()->with('error', 'Ocorreu um Error ao Atualizar Diagnóstico Censitário');
    }
}
