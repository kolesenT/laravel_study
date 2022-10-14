<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\LoginHistory;

class UserLoggedHistory
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
     * @param  \App\Events\UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $new_enter = new LoginHistory();
        $new_enter->user_id = $event->user->id;
        $new_enter->enter_time = new \DateTime();
        $new_enter->ip = $event->request->ip();
        $new_enter->save();
    }
}
