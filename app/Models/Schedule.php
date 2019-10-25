<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = ['schedule_action_id', 'activity', 'amount', 'status', 'deadline', 'institution_id'];
    protected $dates = ['created_id', 'created_at', 'deadline',];


    private $carbon;
    private $year;
    private $currentYear;
    private $finalYear;
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
     * @return Boolean
     */
    public  function validateDeadline($dataForm = [])
    {
        $this->carbon = new Carbon();
        $this->year = $this->carbon->create('Y', 11, 30);
        $this->currentYear =  $this->carbon->createFromDate($this->year->year, 11, 30);
        $this->finalYear =  $this->carbon->createFromDate($this->year->year, 12, 31);

        foreach ($dataForm as $value) {
            if ($value > $this->currentYear && $value <= $this->finalYear || $value > $this->currentYear->addYear())
                return false;
            else
                return true;
        }
    }
    /**
     * Validação de Data Limite do cronograma
     *
     * @param  $data
     * @return Boolean
     */
    public  function validateDeadlineUpdate($data)
    {
        $this->carbon = new Carbon();
        $this->year = $this->carbon->create('Y', 11, 30);
        $this->currentYear =  $this->carbon->createFromDate($this->year->year, 11, 30);
        $this->finalYear =  $this->carbon->createFromDate($this->year->year, 12, 31);

        if ($data > $this->currentYear && $data <= $this->finalYear || $data > $this->currentYear->addYear())
            return false;
        else
            return true;
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
