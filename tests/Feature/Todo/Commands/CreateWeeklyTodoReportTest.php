<?php

namespace Tests\Feature\Todo\Commands;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateWeeklyTodoReportTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function itShouldCreateAnEntryInWeeklyTodoReportsTable()
    {
        User::factory()->has(Todo::factory(10))->create();
        $this->artisan('todo-report:generate');
        $this->assertDatabaseCount('weekly_todo_reports', 1);
    }

}
