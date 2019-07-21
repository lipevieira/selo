<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Answer extends Model
{
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }
}
