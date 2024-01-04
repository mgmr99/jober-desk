<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        //latest notifications
        $notifications = Notification::latest()->get();
        $notification = Notification::whereNull('read_at')->get();
        return view('admin.notifications.index',compact('notifications','notification'));
    }

    public function markAsRead($id)
    {
        dd($id);
        $notification = Notification::find($id);
        $notification->update(['read_at' => now()]);
        return redirect()->back()->with('success','Notification marked as read');
    }
}
