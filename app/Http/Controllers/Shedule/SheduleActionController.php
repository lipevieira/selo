<?php

namespace App\Http\Controllers\Shedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScheduleAction;
use Illuminate\Support\Facades\Validator;
use Response;

class SheduleActionController extends Controller
{
    private $scheduleAction;

    public function __construct(ScheduleAction $scheduleAction)
    {
        $this->scheduleAction = $scheduleAction;
    }
    public function index()
    {
        $scheduleActions = $this->scheduleAction->all();

        return view('shedule_action.index', compact('scheduleActions'));
    }
    public function store(Request $request)
    {
        $messages = [
            'weight.required' => 'O campo peso da ação é obrigatório',
            'description.required' => 'O campo descrição da ação é obrigatório',
        ];

        $validator = Validator::make($request->all(),[
            'weight' => 'required',
            'description' => 'required',
        ], $messages);
        
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataForm = $request->except('_token');
            $scheduleAction = $this->scheduleAction->create($dataForm);

            return response()->json($scheduleAction);
        }
    }
    public function update(Request $request)
    {
        $messages = [
            'weight.required' => 'O campo peso da ação é obrigatório',
            'description.required' => 'O campo descrição da ação é obrigatório',
        ];

        $validator = Validator::make($request->all(), [
            'weight' => 'required',
            'description' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        }else{
            $dataForm = $request->except('_token');
            $action = $this->scheduleAction->find($request->id);
            $action->update($dataForm);

            return response()->json($action);
        }
    }
    public function showAction(Request $request)
    {
        $id = $request->id;
        $action = $this->scheduleAction->find($id);

        return response()->json($action);
    }
    public function delete(Request $request)
    {
        $id = $request->id;

        $this->scheduleAction->find($id)->delete();
    
        return response()->json();
    }
}
