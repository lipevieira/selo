<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
    	return view('company.index');
    }
    public function welcome()
    {
    	return view('welcome');
    }
}
