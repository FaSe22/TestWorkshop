<?php

namespace Tests\Feature\Todo\Services;

use App\Domain\TodoService;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Todo\TodoTestCase;

class TodoServiceTest extends TodoTestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function getMethodShouldReturnAllTodos(): void
    {
        Todo::factory(10)->forUser()->create();
        $res = app(TodoService::class)->getTodos();
        $this->assertCount(10, $res);
    }

    /**
     * @return void
     * @test
     */
    public function getTodoMethodShouldReturnTheTodo(): void
    {
        $todo = Todo::factory()->forUser()->create();
        $res = app(TodoService::class)->getTodo($todo->id);
        $this->assertEquals($todo->id, $res->id);
    }

    /**
     * @test
     * @return void
     */
    public function createMethodShouldCreateATodo(): void
    {
        $user = User::factory()->create();
        $res = app(TodoService::class)->createTodo($this->fields + [
            'user_id' => $user->id
            ]);

        $this->assertDatabaseCount('todos',1);
        $this->assertEquals($user->id, $res->user->id);
        $this->assertEquals($this->fields['title'], $res->title);
    }

    /**
     * @return void
     * @test
     */
    public function deleteTodoMethodShouldDeleteTheTodo(): void
    {
        $todo = Todo::factory()->forUser()->create();
        $res = app(TodoService::class)->deleteTodo($todo->id);
        $this->assertDatabaseCount('todos', 0);
        $this->assertTrue($res);
    }

    /**
     * @return void
     * @test
     */
    public function updateMethodShouldUpdateTheTodo(): void
    {
        $todo = Todo::factory()->forUser()->create();
        $res = app(TodoService::class)->updateTodo($todo->id, $this->fields);
        $this->assertTrue($res);
        $this->assertEquals($this->fields['title'], $todo->refresh()->title);
    }

}
