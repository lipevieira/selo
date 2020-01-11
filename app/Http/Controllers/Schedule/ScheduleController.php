<?php

namespace App\Http\Controllers\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\ScheduleAction;
use App\Models\Institution;
use Carbon\Carbon;


class ScheduleController extends Controller
{
    private $schedule;
    private $institution;

    public function __construct(Schedule $schedule, Institution $institution)
    {
        $this->schedule = $schedule;
        $this->institution = $institution;
    }
    /***
     * @param  $id
     * @return  Institution
     */
    public function index()
    {
        $id = auth()->guard('client')->user()->institution_id;
        $institutions =  $this->institution->find($id);

        $now = new Carbon('next year');
        $yearNow = $now->year;

        return view('institution.update.shedule', compact('institutions','yearNow'));
    }

    public function getSheduleInsert()
    {
        $actions = ScheduleAction::all();
        return view('institution.update.shedule-insert', compact('actions'));
    }
    /***
     * Salvando um cronograma
     * @param mixed $array
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(),  $this->schedule->rules(), $this->schedule->messages());
        $validateDataLimite = $this->schedule->validateDeadline($request['deadline']);

        if ($validator->fails()) {
            return redirect()
                ->route('show.schedule.insert')
                ->withErrors($validator)
                ->withInput();
        }
        if ($validateDataLimite == false) {
            return redirect()->back()->with('error', 'Não é permitido uma data maior que 30 de Novembro!')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $this->schedule->schedule_action_id = $request->schedule_action_id;
            $this->schedule->activity = $request->activity;
            $this->schedule->amount = $request->amount;
            $this->schedule->deadline = $request->deadline;
            $this->schedule->institution_id = auth()->guard('client')->user()->institution_id;;

            $this->schedule->save();

            return redirect()->route('get.shedule.index')->with('success', 'Salvo com sucesso!');
        }
    }
    /***
     * Recuperando um Cronograma pelo id
     * @param mixed $id
     * @return Schedule
     */
    public function showSchedule(Request $request)
    {
        $id = $request->id;
        $schedule = $this->schedule->find($id);
        $actions = ScheduleAction::all();

        $this->authorize('updateInstitution', $schedule);

        return view('institution.update.shedule-update', compact('actions', 'schedule'));
    }
    /***
     * Fazendo atualização no Cronograma
     * @return Schedule
     */
    public function update(Request $request)
    {
        $dataForm = $request->except('_token');
        $rules = [
            'activity' => 'required',
            'amount' => 'required',
            'deadline' => 'required|date',
        ];

        $validator = Validator::make(Input::all(),  $rules, $this->schedule->messages());
        $validateDataLimite = $this->schedule->validateDeadline($dataForm['deadline']);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($validateDataLimite == false) {
            return redirect()->back()->with('error', 'Não é permitido uma data maior que 30 de Novembro!')
                ->withErrors($validator)
                ->withInput();
        } else {
            $schedule = $this->schedule->find($dataForm['id']);

            $schedule->update($dataForm);
            if ($schedule) {
                return redirect()->route('get.shedule.index')->with('success', 'Editado com sucesso!');
            } else {
                return redirect()->route('showSchedule')->with('error', 'Error ao editar!');
            }
        }
    }
}
