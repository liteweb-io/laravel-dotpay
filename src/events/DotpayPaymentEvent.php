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

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Payment $dotpayPayment)
    {
        $this->dotpayPayment = $dotpayPayment;
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
