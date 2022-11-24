<?php

namespace App\Http\Controllers;

use App\Domain\TodoService;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Response;

class TodoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TodoService $todoService)
    {
        return response($todoService->getTodos());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTodoRequest $request
     * @return Response
     */
    public function store(StoreTodoRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function show(int $todo, TodoService $todoService)
    {
        return response($todoService->getTodo($todo));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
