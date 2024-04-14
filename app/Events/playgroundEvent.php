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

class playgroundEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    private Chat $chat;
    /**
     * Create a new event instance.
     */
    public function __construct(string $message, Chat $chat)
    {
        //
        $this->message=$message;
        $this->chat=$chat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
       
        $id = $this->chat->chat_id;
       
        return [ new PrivateChannel('private.playground.'.$id)];
    }

    public function broadcastAs(){
        return 'playground';
    }

    public function broadcastWith(){
        return [
           'message'=>$this->message,
           //'user'=>$this->user->only(['name','email','id'])
        ];
    }

  

}


