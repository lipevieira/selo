<?php

namespace App\Http\Controllers\Shedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScheduleAction;

class SheduleActionController extends Controller
{
    private $scheduleAction;

    public function __construct(ScheduleAction $scheduleAction)
    {
        $this->scheduleAction = $scheduleAction;
    }
    public function index()
    {
        $scheduleActions = $this->scheduleAction->all();

        return view('shedule_action.index', compact('scheduleActions'));
    }
}
