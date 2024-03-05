<?php

namespace App\Providers;
use App\Models\Alert;
use App\Providers\GreetUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeUserNotification
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
     * @param  \App\Providers\GreetUser  $event
     * @return void
     */
    public function handle(GreetUser $event)
    {
        $username = $event->user;
        Alert::create(['title'=>''.$username->name.' just logged in to our portal']);
    }
}
