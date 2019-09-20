<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;


class AnswerController extends Controller
{
    private $answer;

    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }
    public function show(Request $request)
    {
        dd($request->all());
    }
}
