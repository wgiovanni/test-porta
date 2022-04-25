<?php

namespace App\Listeners;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class LastLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->update(['date_last_session' => Carbon::now()]);
    }
}