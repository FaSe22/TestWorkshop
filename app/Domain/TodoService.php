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

}
