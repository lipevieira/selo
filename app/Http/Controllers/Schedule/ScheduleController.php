<?php

namespace App\Http\Controllers\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\ScheduleAction;


class ScheduleController extends Controller
{
    private $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }
    public function getSheduleInsert()
    {
        $actions = ScheduleAction::all();

        // dd($actions);

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
        $validateDataLimite = $this->schedule->validateDeadlineUpdate($request->deadline);

        if ($validator->fails()) {
            return redirect()
                ->route('show.schedule.insert')
                ->withErrors($validator)
                ->withInput();
        }
        if ($validateDataLimite == false) {

            return redirect()->back()->with('error', 'Não é permitido uma data maior ou igual ao dia 30 de novembro!');
        } else {
            $this->schedule->schedule_action_id = $request->schedule_action_id;
            $this->schedule->activity = $request->activity;
            $this->schedule->amount = $request->amount;
            $this->schedule->deadline = $request->deadline;
            // TO-DE Fazer: Pegar o ID da empresa logada no sistema.
            $this->schedule->institution_id = 1;

            $this->schedule->save();

            return redirect()->route('auth.get.shedule')->with('success', 'Salvo com sucesso!');
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
        $validateDataLimite = $this->schedule->validateDeadlineUpdate($dataForm['deadline']);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($validateDataLimite == false) {

            return redirect()->back()->with('error', 'Não é permitido uma data maior ou igual ao dia 30 de novembro!');
        } else {
            $schedule = $this->schedule->find($dataForm['id']);

            $schedule->update($dataForm);
            if ($schedule) {
                return redirect()->route('auth.get.shedule')->with('success', 'Editado com sucesso!');
            } else {
                return redirect()->route('auth.get.shedule')->with('errors', 'Error ao editar!');
            }
        }
    }
}
