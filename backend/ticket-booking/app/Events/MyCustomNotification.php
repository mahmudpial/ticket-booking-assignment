<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyCustomNotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;

    /**
     * Create a new event instance.
     */
    public function __construct(string $message = 'A ticket was booked for you')
    {
        $this->message = $message;
    }

    /**
     * Condition: channel name must be 'my-custom-notification'
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('my-custom-notification'),
        ];
    }

    /**
     * Condition: event name must be 'my-ticket-booking-event'
     */
    public function broadcastAs(): string
    {
        return 'my-ticket-booking-event';
    }
}
