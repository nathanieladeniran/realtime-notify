<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistration implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        /*return [
            new PrivateChannel('channel-name'),
        ];*/
        return [
            //new PrivateChannel('channel-name'), 
            //we removed Private below because we are not authenticating any user and our channel name 
            //is popup-channel it cna be found on the javascript part of the header in welcome.blade
            new Channel('notify-channel'),  
        ];
    }

    
    /**
     * Broadcast event client-register
     * 
     */
    public function broadcastAs()
    {
        return 'user-register'; //event name
    }
}
