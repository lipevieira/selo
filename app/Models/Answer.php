<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Answer extends Model
{
    protected $fillable = ['others', 'alternative_id', 'institution_id'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    // public function alternatives()
    // {
    //     return $this->hasMany(Alternative::class);
    // }
}
