<?php

namespace Tests\Feature\Todo\Models;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\Feature\Todo\TodoTestCase;
use Tests\TestCase;

/**
 * @property Collection|Model|mixed $user
 */
class TodoTest extends TodoTestCase
{

    use RefreshDatabase;


    /**
     * @test
     * @return void
     */
    public function itShouldCreateAnEntryInTodosTable(): void
    {
        Todo::create($this->fields + ['user_id' => $this->user->id]);
        $this->assertDatabaseCount('todos', 1);
    }


    /**
     * @test
     * @dataProvider provideNonNullableField
     * @param $input
     * @return void
     */
    public function fieldShouldBeNotNullable($input): void
    {
        unset($this->fields[$input]);

        $this->expectException(QueryException::class);
        Todo::create($this->fields +['user_id' => $this->user->id]);
    }

    /**
     * @test
     * @return void
     */
    public function titleMaxLengthIsSetTo50(): void
    {
        $this->fields['title'] = Str::random(51);

        $this->expectException(QueryException::class);
        Todo::create($this->fields +['user_id' => $this->user->id]);
    }



    /**
     * @test
     * @return void
     */
    public function aTodoMustBelongToAUser(): void
    {
        $this->expectException(QueryException::class);
        Todo::create($this->fields);
    }

    /**
     * @test
     * @return void
     */
    public function aTodoBelongsToAUser(): void
    {
        $todo =Todo::create($this->fields + ['user_id' => $this->user->id]);
        $this->assertEquals($this->user->id, $todo->user->id);
    }


    /**
     * @test
     * @return void
     */
    public function statusDefaultShouldBeTodo(): void
    {
        $todo = Todo::create($this->fields +['user_id' => $this->user->id]);
        $this->assertEquals('TODO', $todo->refresh()->status);
    }

    /**
     * @test
     * @return void
     */
    public function priorityIsOptional(): void
    {
        Todo::create($this->fields +['user_id' => $this->user->id]);
        $this->assertDatabaseCount('todos', 1);
    }

    /**
     * @test
     * @param $input
     * @param $result
     * @return void
     * @dataProvider provideFieldValues
     */
    public function valuesShouldBeWrittenToDatabase($input, $result): void
    {
        Todo::create($this->fields + ['user_id' => $this->user->id]);
        $this->assertDatabaseHas('todos', [$input => $result]);
    }


    public function provideNonNullableField(): array
    {
        return [
            'title is not nullable' => ['title'],
            'body is not nullable' => ['body'],
            'due date is not nullable' => ['due_date']
        ];
    }

    public function provideFieldValues(): array
    {
        return [
            "a Todo has a Title" =>['title', $this->fields['title']],
            "a Todo has a Body" => ['body', $this->fields['body']],
            "a Todo has a Due Date" => ['due_date', $this->fields['due_date']],
            "a Todo has a Priority" =>['priority', $this->fields['priority']],
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }


}
