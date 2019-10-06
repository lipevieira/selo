<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\CompanyClassification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class ClientController extends Controller
{
    private $institution;
    private $companyClassification;

    public function __construct(Institution $institution, CompanyClassification $companyClassification)
    {
        $this->institution = $institution;
        $this->companyClassification = $companyClassification;
    }
    /**
     * Mostar o formulario de login
     *
     * @return void
     */
    public function showLogin()
    {
        return view('institution.login');
    }
    public function index()
    {
        $id = auth()->guard('client')->user()->institution_id;
        $institutions  = $this->institution->find($id);
        $companyClassifications = $this->companyClassification->all(); 
    
        return view('institution.update.update-institution', compact('institutions', 'companyClassifications'));
    }
    /**
     * Fazendo login da instituição caso esteja cadastrada
     *
     * @param Request $request
     * @return void
     */
    public function clientLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::guard('client')->attempt($credentials)) {
            return redirect()->route('index.client');
        } else {
            return redirect()
                ->back()
                ->withErrors(['errors' => 'Login Inválido'])
                ->withInput();
        }
    }
    /**
     * Fazendo logout da Instituição
     *
     * @return void
     */
    public function logout()
    {
        auth()->guard('client')->logout();
        return redirect()->route('login.client');
    }

}
