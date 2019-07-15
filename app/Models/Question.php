<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @description:  Uma pergunta tem uma reposta
     * Relacionameto 1 - 1
     * @return Answer
     */
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
