<?php

namespace App\Policies;

use App\Models\User;
use App\Models\statusProject;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusProjectPolicy
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
        return $user->hasPermission('status-project-views');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, statusProject $statusProject)
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
        return $user->hasPermission('status-project-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, statusProject $statusProject)
    {
        return $user->hasPermission('status-project-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, statusProject $statusProject)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, statusProject $statusProject)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\statusProject  $statusProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, statusProject $statusProject)
    {
        return $user->hasPermission('status-project-delete');
    }
}
