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

        // $notification = $this->institution->with('notifications')->get();
        // $notification = $this->institution->find(1)->notifications;

        // return response()->json(compact('notification'));



        $notification = ['name' => 'Notificação 01'];

        return response()->json(compact('notification'));
       
    }
}
