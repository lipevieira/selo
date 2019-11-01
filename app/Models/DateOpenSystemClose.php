<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DateOpenSystemClose extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_open', 'date_close',
    ];
    protected $dates = ['created_id', 'created_at', 'date_open', 'date_close'];
}
