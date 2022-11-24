<?php

namespace App\Listeners;

use App\Events\WeeklyTodoReportCreated;
use App\Models\User;
use App\Notifications\WeeklyTodoReportAvailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WeeklyReportAvailable
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(WeeklyTodoReportCreated $reportCreated)
    {
        /** @var User $user */
        $user =User::find($reportCreated->weekly_todo_report->user_id);
        $user->notify(new WeeklyTodoReportAvailable($reportCreated->weekly_todo_report));
    }
}
