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
use Liteweb\Dotpay\Models\Payment;

class DotpayPaymentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $dotpayPayment;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Payment $dotpayPayment, $user = null)
    {
        $this->dotpayPayment = $dotpayPayment;
        $this->user = $user;
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
