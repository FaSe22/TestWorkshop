<?php

namespace Tests\Feature\Todo\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Todo\DataProviders\FieldsProvider;
use Tests\Feature\Todo\TodoTestCase;

/**
 * @property Collection|Model|mixed $authenticated_user
 * @property Collection|Model|mixed $todo
 */
class TodoControllerTest extends TodoTestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function indexShouldBeSuccessful(): void
    {
        $this->actingAs($this->authenticated_user)->get('todos')->assertSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function destroyShouldBeSuccessful(): void
    {
        $this->actingAs($this->authenticated_user)->delete('todos/'. $this->todo->id)->assertSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function showShouldBeSuccessful(): void
    {
        $this->actingAs($this->authenticated_user)->get('todos/'. $this->todo->id)->assertSuccessful();
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
        $this->actingAs($this->authenticated_user)->post('todos', $this->fields)->assertInvalid($input);
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
        $this->actingAs($this->authenticated_user)->patch('todos/' . $this->todo->id, $this->fields)->assertInvalid($input);
    }


    /**
     * @return void
     * @test
     */
    public function onlyAuthenticatedUsersCanSeeTodos(): void
    {
        $this->get('todos')->assertForbidden();
    }

    /**
     * @return void
     * @test
     */
    public function onlyOwnerCanDeleteTodo(): void
    {
        $random_user = User::factory()->create();
        $this->actingAs($random_user)->delete('todos/'. $this->todo->id)->assertForbidden();
    }


    /**
     * @return void
     * @test
     */
    public function onlyOwnerCanSeeHisTodo(): void
    {
        $random_user = User::factory()->create();
        $this->actingAs($random_user)->get('todos/'. $this->todo->id)->assertForbidden();
    }

    /**
     * @return void
     * @test
     */
    public function onlyOwnerCanUpdateHisTodo(): void
    {
        $random_user = User::factory()->create();
        $this->actingAs($random_user)->patch('todos/' . $this->todo->id, $this->fields)->assertForbidden();
    }

    /**
     * @return void
     * @test
     */
    public function onlyAuthenticatedUsersCanCreateTodos(): void
    {
        $this->post('todos', $this->fields)->assertForbidden();
    }



    public function provideNonNullableField(): array
    {
        return app(FieldsProvider::class)->provideNonNullableField();
    }

    public function provideFieldValues(): array
    {
        return app(FieldsProvider::class)->provideFieldValues();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->authenticated_user = User::factory()->create();
        $this->todo = Todo::factory()->for($this->authenticated_user)->create();
    }

}
