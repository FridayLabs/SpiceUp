<?php

namespace App\Events\Widgets\Timer;

use App\StateWidget;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StartEvent implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var StateWidget
     */
    public $stateWidget;
    public $startedTime;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StateWidget $stateWidget, $startedTime)
    {
        $this->stateWidget = $stateWidget;
        $this->startedTime = $startedTime;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ["screen.".$this->stateWidget->state->screen->public_id];
    }
}
