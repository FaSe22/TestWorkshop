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

    public function getTodo(int $id)
    {
        return Todo::findOrFail($id);
    }

    public function createTodo(array $args)
    {
        return Todo::create($args);
    }

    public function deleteTodo(int $id)
    {
        return Todo::findOrFail($id)->delete();
    }

    public function updateTodo(int $id, array $args)
    {
        return Todo::findOrFail($id)->update($args);
    }

}
