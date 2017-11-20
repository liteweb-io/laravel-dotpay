<?php

namespace Liteweb\LaravelDotpay\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Liteweb\Dotpay\Models\DotpayCallback;

class DotpayCallbackEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $dotpayCallback;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DotpayCallback $dotpayCallback)
    {
        $this->dotpayCallback = $dotpayCallback;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
