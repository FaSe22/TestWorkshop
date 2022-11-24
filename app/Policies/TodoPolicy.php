<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        return Auth()->check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Todo $todo
     * @return Response|bool
     */
    public function view(User $user, Todo $todo)
    {
       return $user->id === $todo->user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Todo $todo
     * @return Response|bool
     */
    public function update(User $user, Todo $todo)
    {
        return $user->id === $todo->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Todo $todo
     * @return Response|bool
     */
    public function delete(User $user, Todo $todo)
    {
        return $user->id === $todo->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Todo $todo
     * @return Response|bool
     */
    public function restore(User $user, Todo $todo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Todo $todo
     * @return Response|bool
     */
    public function forceDelete(User $user, Todo $todo)
    {
        //
    }
}
