<?php

namespace Tests\Feature\Todo;

use Tests\TestCase;

abstract class TodoTestCase extends TestCase
{

    protected array $fields = [
        'title' => '__title__',
        'body' => '__body__',
        'due_date' => "2023-01-01",
        'priority' => 'HIGH',
    ];

}
