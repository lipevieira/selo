<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
