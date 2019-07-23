<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionMembers extends Model
{
    protected $fillable = ['name', 'email', 'function', 'phone', 'institution_id'];
    /**
     * Descrioption: Volta do relacionameto
     * Muitos Menbro da comissão pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
