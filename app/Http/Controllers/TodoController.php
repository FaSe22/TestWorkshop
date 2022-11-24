<?php

namespace App\Http\Controllers;

use App\Domain\TodoService;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Todo::class, 'todo');
    }

    /**
     * Display a listing of the resource.
     *
     * @param TodoService $todoService
     * @return Response
     */
    public function index(TodoService $todoService): Response
    {
        return response($todoService->getTodos());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTodoRequest $request
     * @param TodoService $todoService
     * @return Response
     */
    public function store(StoreTodoRequest $request, TodoService $todoService): Response
    {
        return response($todoService->createTodo($request->validated() + ['user_id' =>Auth::id()]));
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @param TodoService $todoService
     * @return Response
     */
    public function show(TodoService $todoService, Todo $todo): Response
    {
        return response($todoService->getTodo($todo));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @param TodoService $todoService
     * @return Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo, TodoService $todoService): Response
    {
        return response($todoService->updateTodo($todo, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @param TodoService $todoService
     * @return Response
     */
    public function destroy(TodoService $todoService, Todo $todo): Response
    {
        return response($todoService->deleteTodo($todo));
    }
}
