<?php

namespace Tests\Feature\Todo\DataProviders;

use Tests\Feature\Todo\TodoTestCase;

class FieldsProvider extends TodoTestCase
{
    public function provideNonNullableField(): array
    {
        return [
            'title is required' => ['title'],
            'body is required' => ['body'],
            'due date is required' => ['due_date']
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
}
