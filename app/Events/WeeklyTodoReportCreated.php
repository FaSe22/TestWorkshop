<?php

namespace App\Events;

use App\Models\WeeklyTodoReport;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeeklyTodoReportCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public WeeklyTodoReport $weekly_todo_report;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(WeeklyTodoReport $weekly_todo_report)
    {
        $this->weekly_todo_report = $weekly_todo_report;
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
