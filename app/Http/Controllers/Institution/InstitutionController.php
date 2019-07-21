<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class InstitutionController extends Controller
{
    public function index()
    {
        // Book::with('author')->get()
        $questionAlternatives = Question::with('alternatives')->get();

    	return view('institution.index',compact('questionAlternatives'));
    }
    public function welcome()
    {
    	return view('welcome');
    }
}
