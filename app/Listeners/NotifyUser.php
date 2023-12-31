<?php

namespace App\Listeners;

use Mail;
use App\Models\User;
use App\Mail\UserMail;
use App\Events\JobCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobCreated $event): void
    {
        //users who has user role
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        
        foreach ($users as $user) {
            Mail::to($user->email)->send(new UserMail($event->job));
        }
    }
}
