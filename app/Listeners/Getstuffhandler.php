<?php

namespace App\Listeners;
use App\orders;
use App\Events\Getstuff;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Getstuffhandler
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
     * @param  Getstuff  $event
     * @return void
     */
    public function handle(Getstuff $event)
    {
   
   $newRecord=new orders;
   $newRecord->user_id=\Auth::user()->id;
   $newRecord->stuff_id=$event->stuffid;
   $newRecord->owner_id=$event->ownerid;
   $newRecord->save();
    }
}
