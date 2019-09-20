<?php

namespace App\Http\Controllers\Branche;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
 

class BrancheController extends Controller
{
    private $branche;

    public function __construct(Branch $branch)
    {
        $this->branche = $branch;
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(),  $this->branche->rules, $this->branche->messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);

        }
        if ($this->branche->validateCnpj($request->cnpj_additional) == false) {
            $validator = ['errors' => 'CNPJ Inválido, por favor corrija.',];

            return response()->json(['errors' => $validator]);
        }else{
            $save = $this->branche->insert([
                'cnpj_additional'  => $request->cnpj_additional,
                'institution_id'    => 1,
            ]);

            if ($save) {
                return response()->json($save);
            }
        }
    }
    public function show(Request $request)
    {
        $id = $request->id;
        $branche = $this->branche->find($id);

        return response()->json($branche);
    }
    public function update(Request $request)
    {
        $validator = Validator::make(Input::all(),  $this->branche->rules, $this->branche->messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($this->branche->validateCnpj($request->cnpj_additional) == false) {
            $validator = ['errors' => 'CNPJ Inválido, por favor corrija.',];

            return response()->json(['errors' => $validator]);
        } else{
            $branche = $this->branche->find($request->id);
            $branche->update([
                'cnpj_additional'  => $request->cnpj_additional,
                'institution_id'    => 1,
            ]);
    
            if ($branche) {
                return response()->json($branche);
            }
        }
    }
    public function delete(Request $request)
    {
        $delete =$this->branche->find($request->id)->delete();
        if ($delete) {
            return response()->json();
        }
    }
}
