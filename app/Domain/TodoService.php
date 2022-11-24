<?php

namespace App\Domain;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoService
{

    public function getTodos(): Collection
    {
        return Todo::all();
    }

    public function getTodo($todo)
    {
        return $todo;
    }

    public function createTodo(array $args)
    {
        return Todo::create($args);
    }

    public function deleteTodo(Todo $todo)
    {
        return $todo->delete();
    }

    public function updateTodo(Todo $todo, array $args)
    {
        return $todo->update($args);
    }

}
