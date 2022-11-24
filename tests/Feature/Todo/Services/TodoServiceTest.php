<?php

namespace Tests\Feature\Todo\Services;

use App\Domain\TodoService;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function getMethodShouldReturnAllTodos()
    {
        $todos = Todo::factory(10)->forUser()->create();
        $res = app(TodoService::class)->get();
        $this->assertCount(10, $res);
    }

    /**
     * @return void
     * @test
     */
    public function findMethodShouldReturnTheTodo()
    {

    }

    /**
     * @test
     * @return void
     */
    public function createMethodShouldCreateAnEntryInTodosTable()
    {

    }

    /**
     * @return void
     * @test
     */
    public function deleteMethodShouldDeleteTheTodo()
    {

    }

    /**
     * @return void
     * @test
     */
    public function updateMethodShouldUpdateTheTodo()
    {

    }

}
