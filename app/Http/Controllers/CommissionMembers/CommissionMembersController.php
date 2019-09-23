<?php

namespace App\Http\Controllers\CommissionMembers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommissionMembers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Institution;


class CommissionMembersController extends Controller
{
    private $comission;
    private $institution;

    public function __construct(CommissionMembers $comission, Institution $institution)
    {
        $this->comission = $comission;    
        $this->institution = $institution;    
    }
    public function index()
    {
        $id = auth()->guard('client')->user()->id;
        $institutions = $this->institution->find($id);

        return view('institution.update.membrers', compact('institutions'));
      
    }
    /**
     * Recuperando um membro da comissão
     *
     * @param Request $request
     * @return CommissionMembers
     */
    public function show(Request $request)
    {
        $membrers = $this->comission->find($request->id);

        return response()->json($membrers);
    }
    /**
     * Atualizando um membro da comissão
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $dataForm = $request->except('_token');
        $validator = Validator::make(Input::all(),  $this->comission->rules($dataForm['id']), $this->comission->messages());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{
            $id = $request->id;
            $membrers = $this->comission->find($id);
            $membrers->update($dataForm);
    
            return response()->json($membrers);
        }
    }
}
