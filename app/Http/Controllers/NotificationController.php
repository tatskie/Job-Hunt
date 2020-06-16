<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function notifications(){
    	$notifications = auth()->user()->notifications()->orderBy('updated_at', 'desc')->paginate(20);

    	return view('notifications.index')->with('notifications', $notifications);
    }
}
