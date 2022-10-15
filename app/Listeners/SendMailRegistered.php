<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\EmailConfirm;
use Illuminate\Support\Facades\Mail;

class SendMailRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(new EmailConfirm($event->user));
    }
}
