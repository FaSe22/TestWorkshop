<?php

namespace Tests\Feature\Todo\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function itShouldCreateAnEntryInTodosTable()
    {

    }

    /**
     * @test
     * @return void
     */
    public function titleShouldNotBeNullable()
    {

    }

    /**
     * @test
     * @return void
     */
    public function titleMaxLengthIsSetTo50()
    {

    }

    /**
     * @test
     * @return void
     */
    public function bodyShouldNotBeNullable()
    {

    }

    /**
     * @test
     * @return void
     */
    public function aTodoMustBelongToAUser()
    {

    }

    /**
     * @test
     * @return void
     */
    public function dueDateShouldNotBeNullable()
    {

    }

    /**
     * @test
     * @return void
     */
    public function statusDefaultShouldBeTodo()
    {

    }

    /**
     * @test
     * @return void
     */
    public function priorityIsOptional()
    {

    }


}
