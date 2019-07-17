<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstitutionController extends Controller
{
    public function index()
    {
    	return view('institution.index');
    }
    public function welcome()
    {
    	return view('welcome');
    }
}
