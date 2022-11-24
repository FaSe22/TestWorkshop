<?php

namespace App\Domain;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoService
{

    public function get(): Collection
    {
        return Todo::all();
    }

}
