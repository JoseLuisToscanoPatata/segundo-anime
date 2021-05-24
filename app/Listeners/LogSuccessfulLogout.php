<?php

namespace App\Listeners;

 use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * New listener that happens everytime an user logs out, which set the last_online column is his database table to the current date
 */
class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
            $event->user->last_online = date("D, j F Y G:i");
            $event->user->save();
    }
}
