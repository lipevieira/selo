<?php

namespace App\Http\Controllers\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use Response;

class ScheduleController extends Controller
{
    private $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;    
    }
    /***
     * Salvando um cronograma
     */
    public function store(Request $request)
    {
        // $dataForm = $request->all();

        $validator = Validator::make($request->all(), [
            'schedule_action_id' => 'required',
            'activity' => 'required',
            'amount' => 'required',
            'deadline' => 'required|date',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));

        }else{
            $this->schedule->schedule_action_id = $request->schedule_action_id;
            $this->schedule->activity = $request->activity;
            $this->schedule->amount = $request->amount;
            $this->schedule->deadline = $request->deadline;
            // TO-DE Fazer: Pegar o ID da empresa logada no sistema.
            $this->schedule->institution_id = 1;

            $this->schedule->save();
        }
    }
}
