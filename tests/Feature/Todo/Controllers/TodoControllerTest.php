<?php

namespace Tests\Feature\Todo\Controllers;

use App\Domain\TodoService;
use App\Models\Todo;
use Mockery\MockInterface;
use Tests\Feature\Todo\DataProviders\FieldsProvider;
use Tests\Feature\Todo\TodoTestCase;

class TodoControllerTest extends TodoTestCase
{
    /**
     * @return void
     * @test
     */
    public function indexShouldBeSuccessful(): void
    {
        $this->get('todos')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function destroyShouldBeSuccessful(): void
    {
        $this->mock(TodoService::class, function (MockInterface $mock) {
            $mock->shouldReceive('deleteTodo')->andReturn(true);
        });

        $this->delete('todos/1')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function showShouldBeSuccessful(): void
    {
        $this->mock(TodoService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getTodo')->andReturn(new Todo());
        });

        $this->get('todos/1')->assertSuccessful();
    }

    /**
     * @param $input
     * @return void
     * @dataProvider provideNonNullableField
     * @test
     */
    public function itShouldReturnValidationErrorsForPost($input): void
    {
        unset($this->fields[$input]);
        $this->post('todos', $this->fields)->assertInvalid($input);
    }

    /**
     * @param $input
     * @return void
     * @dataProvider provideNonNullableField
     * @test
     */
    public function itShouldReturnValidationErrorsForPatch($input): void
    {
        unset($this->fields[$input]);
        $this->patch('todos/1', $this->fields)->assertInvalid($input);
    }


    public function provideNonNullableField(): array
    {
        return app(FieldsProvider::class)->provideNonNullableField();
    }

    public function provideFieldValues(): array
    {
        return app(FieldsProvider::class)->provideFieldValues();
    }

}
