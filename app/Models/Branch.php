<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['cnpj_additional', 'institution_id'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
