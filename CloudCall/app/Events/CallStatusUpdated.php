<?php

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CallStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $status;
    public $clientId;

    public function __construct($call)
    {
        $this->status = $call->status;
        $this->clientId = $call->client_id;
    }

    public function broadcastOn()
    {
        return new Channel('call.' . $this->clientId);
    }

    public function broadcastAs()
    {
        return 'call.status.updated';
    }

    public function broadcastWith()
    {
        return [
            'status' => $this->status,
        ];
    }
}
