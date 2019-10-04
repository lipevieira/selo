<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['doc_name', 'description', 'institution_id' ];
    protected $dates = [
        'created_id',
        'created_at',
    ];
}
