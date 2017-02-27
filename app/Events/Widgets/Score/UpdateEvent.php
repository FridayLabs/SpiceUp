<?php

namespace App\Events\Widgets\Score;

use App\StateWidget;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdateEvent implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var StateWidget
     */
    public $stateWidget;
    public $score;
    public $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StateWidget $stateWidget, $team, $score)
    {
        $this->stateWidget = $stateWidget;
        $this->team = $team;
        $this->score = $score;
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
