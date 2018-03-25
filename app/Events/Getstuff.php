<?php

namespace App\Events;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class Getstuff extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $stuffid;
    public $userid;
    public $ownerid;

    public function __construct($stuffid,$userid,$ownerid)
    {
        $this->stuffid=$stuffid;
        $this->userid=$userid;
        $this->ownerid=$ownerid;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
