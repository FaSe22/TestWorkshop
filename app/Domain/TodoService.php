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

}
