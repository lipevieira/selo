<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = ['schedule_action_id', 'activity', 'amount', 'status', 'deadline', 'institution_id' ];
    protected $dates = [
        'created_id',
        'created_at',
        'deadline',
    ];
    /**
     * Descrioption: Volta do relacionameto
     * Muitos cronogramas pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    /***
     * @Description: Relacionamento 1 - N
     * Muitas ações petencem ao um cronograma de ação
     */
    public function action()
    {
        return $this->belongsTo('App\Models\ScheduleAction', 'schedule_action_id');
    }
    /**
     * Validação de Data Limite do cronograma
     *
     * @param array $dataForm
     * @return void
     */
    public  function validateDeadline($dataForm = array())
    {
        $now = new Carbon();
        $ano = $now->year;
        $mes = 11;
        $dia = 29;
        $deadlineValidate = Carbon::createFromDate($ano, $mes, $dia);
        $valida = true;

        foreach ($dataForm as $value) {
            if ($value > $deadlineValidate) {
                $valida = false;
            }
        }
        return $valida;
    }
    /**
     * Validação de Data Limite do cronograma
     *
     * @param  $data
     * @return void
     */
    public  function validateDeadlineUpdate($data)
    {
        $now = new Carbon();
        $ano = $now->year;
        $mes = 11;
        $dia = 29;
        $deadlineValidate = Carbon::createFromDate($ano, $mes, $dia);
        $valida = true;

            if ($data > $deadlineValidate) {
                $valida = false;
            }
        return $valida;
    }
    public function rules()
    {
        return [
            'schedule_action_id' => 'required',
            'activity' => 'required',
            'amount' => 'required',
            'deadline' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'schedule_action_id.required' => 'O campo Ação obrigatório',
            'activity.required' => 'O campo Atividade obrigatório',
            'amount.required' => 'O campo Quantidade obrigatório ',
            'deadline.required' => 'O campo Data Limite obrigatório',
        ];
    }
}
