<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = ['action', 'activity', 'amount', 'status', 'deadline', 'institution_id' ];
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
}
