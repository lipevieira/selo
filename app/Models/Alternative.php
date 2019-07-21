<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    /***
     * @description: Uma alternativa pertence há uma questão
     * @return Question
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /*** 
     * @description: Volta do relacionamento
     * 1 - 1
     */
    public function answers()
    {
        return $this->belongsTo(Answer::class);
    }
}
