<?php

namespace Tests\Feature\Todo\Models;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class TodoTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function itShouldCreateAnEntryInTodosTable()
    {
        $user = User::factory()->create();
        Todo::create([
            'title' => '__title__',
            'body' => '__body__',
            'due_date' => today()->addDays(2),
            'priority' => 'HIGH',
            'user_id' => $user->id
        ]);

        $this->assertDatabaseCount('todos', 1);
    }


    /**
     * @test
     * @return void
     */
    public function titleShouldNotBeNullable()
    {
        $this->expectException(QueryException::class);

        $user = User::factory()->create();
        Todo::create([
            'title' => null,
            'body' => '__body__',
            'due_date' => today()->addDays(2),
            'priority' => 'HIGH',
            'user_id' => $user->id
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function titleMaxLengthIsSetTo50()
    {
        $this->expectException(QueryException::class);

        $user = User::factory()->create();
        Todo::create([
            'title' => Str::random(51),
            'body' => '__body__',
            'due_date' => today()->addDays(2),
            'priority' => 'HIGH',
            'user_id' => $user->id
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function bodyShouldNotBeNullable()
    {

    }

    /**
     * @test
     * @return void
     */
    public function aTodoMustBelongToAUser()
    {

    }

    /**
     * @test
     * @return void
     */
    public function dueDateShouldNotBeNullable()
    {

    }

    /**
     * @test
     * @return void
     */
    public function statusDefaultShouldBeTodo()
    {

    }

    /**
     * @test
     * @return void
     */
    public function priorityIsOptional()
    {

    }


}
