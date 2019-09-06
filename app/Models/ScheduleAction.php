<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleAction extends Model
{
    protected $fillable = ['weight', 'description'];

    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule', 'schedule_action_id','id');
    }
}
