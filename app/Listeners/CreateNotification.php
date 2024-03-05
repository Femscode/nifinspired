<?php

namespace App\Listeners;

use App\Events\Alert;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNotification
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
     * @param  \App\Events\Alert  $event
     * @return void
     */
    public function handle(Alert $event)
    {
        $username = $event->user;
        Notification::create([
            'title' => $username->name.' just registered',
            'description' => 'This is coming from an event'
        ]);
    }
}
