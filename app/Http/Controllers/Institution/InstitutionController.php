<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\ScheduleAction;

class InstitutionController extends Controller
{
    public function index()
    {
        $actions = ScheduleAction::all();
        $questionAlternatives = Question::with('alternatives')->get();

    	return view('institution.index',compact('questionAlternatives','actions'));
    }
    public function welcome()
    {
    	return view('welcome');
    }
    public function saveAllInstutition(Request $request)
    {
        $dataForme = $request->all();

        dd($dataForme);
    }
  
}
