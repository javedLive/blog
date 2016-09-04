<?php

namespace App\Listeners;

use App\Events\LastInsert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DataNotification
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
     * @param  LastInsert  $event
     * @return void
     */
    public function handle(LastInsert $event)
    {
        //
    }
}
