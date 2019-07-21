<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @description:  Uma pergunta tem muitas alternativas
     * Relacionameto 1 - N
     * @return Alternative
     */
    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }
}
