<?php

namespace Tests\Feature\Todo\EventListeners;

use App\Events\WeeklyTodoReportCreated;
use App\Listeners\WeeklyReportAvailable;
use App\Models\WeeklyTodoReport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class WeeklyReportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function onCreatedWeeklyTodoReportCreatedEventShouldBeDispatched()
    {
        Event::fake();
        WeeklyTodoReport::factory()->forUser()->create();
        Event::assertDispatched(WeeklyTodoReportCreated::class);
    }

    /**
     * @return void
     * @test
     */
    public function WeeklyTodoReportAvailableListensToWeeklyTodoReportCreatedEvent()
    {
        Event::fake();
        WeeklyTodoReport::factory()->forUser()->create();
        Event::assertListening(WeeklyTodoReportCreated::class, WeeklyReportAvailable::class);
    }

}
