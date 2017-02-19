<?php

namespace App\Events;

use App\StateWidget;
use App\Widget;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var StateWidget
     */
    public $stateWidget;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StateWidget $stateWidget)
    {
        $this->stateWidget = $stateWidget;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('screen.' . $this->stateWidget->state->screen->public_id);
    }
}
