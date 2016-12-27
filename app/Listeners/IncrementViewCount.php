<?php

namespace App\Listeners;

use App\Events\ViewPostEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementViewCount
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
     * @param  ViewPostEvent  $event
     * @return void
     */
    public function handle(ViewPostEvent $event)
    {
        // Increment the view counter by one...
        $event->post->increment('view_count');
    }
}
