<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;

class NotificationController extends Controller
{
    private $institution;

    public function __construct(Institution $institution)
    {
        $this->institution = $institution;
    }

    public function notificationRegisterInstitution()
    {

        $notification = $this->institution->with('notifications')->get();
    
        // return response()->json(compact('notification'));
        // \dd($notification);
        return view('layouts.notification.notification', compact('notification'));
    }
}
