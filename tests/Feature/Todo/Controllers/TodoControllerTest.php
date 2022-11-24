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

    public function destroyShouldBeSuccessful()
    {

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
