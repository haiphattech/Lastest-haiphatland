<?php

namespace App\Policies;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JournalsPolicy
{
    use HandlesAuthorization;
    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Journal $journals)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Journal $journals)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Journal $journals)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Journal $journals)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journals
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Journal $journals)
    {
        //
    }
}