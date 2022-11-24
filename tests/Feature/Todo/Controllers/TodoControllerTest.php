<?php

namespace Tests\Feature\Todo\Controllers;

use App\Domain\TodoService;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    /**
     * @return void
     * @test
     */
    public function indexShouldBeSuccessful()
    {
        $this->get('todos')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function destroyShouldBeSuccessful()
    {
        $this->mock(TodoService::class, function(MockInterface $mock){
            $mock->shouldReceive('deleteTodo')->andReturn(true);
        });

        $this->delete('todos/1')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function showShouldBeSuccessful()
    {
        $this->mock(TodoService::class, function(MockInterface $mock){
           $mock->shouldReceive('getTodo')->andReturn(new Todo());
        });

        $this->get('todos/1')->assertSuccessful();
    }
}
