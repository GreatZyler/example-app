<?php

namespace App\Events;
use App\Models\Chat;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Sent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
private $user;
    private Chat $chat;
    /**
     * Create a new event instance.
     */
    public function __construct(Chat $chat,$user)
    {
        $this->chat=$chat;
        $this->user=$user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        $id= $this->chat->for_id;
        return [
            new Channel('public.sendMessage'.$id),
        ];
    }

    public function broadcastAs() {
        return 'sendMessage';
    }

    
    public function broadcastWith(){
        return [
           'chat'=>$this->chat,
           'user'=>$this->user
           //'user'=>$this->user->only(['name','email','id'])
        ];
    }

}
