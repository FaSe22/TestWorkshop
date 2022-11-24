<?php

namespace Tests\Feature\Todo\Notifications;

use App\Models\User;
use App\Models\WeeklyTodoReport;
use App\Notifications\WeeklyTodoReportAvailable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class WeeklyTodoReportAvailableTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function usersGetANotificationMailWhenWeeklyTodoReportIsCreated()
    {
        Notification::fake();
        $user =User::factory()->has(WeeklyTodoReport::factory())->create();
        Notification::assertSentTo($user, WeeklyTodoReportAvailable::class);

    }

}
