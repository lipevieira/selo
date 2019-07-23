<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['action', 'activity', 'amount', 'status', 'deadline', 'institution_id' ];
    /**
     * Descrioption: Volta do relacionameto
     * Muitos cronogramas pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
