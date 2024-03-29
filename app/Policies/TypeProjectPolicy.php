<?php

namespace App\Policies;

use App\Models\TypeProject;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeProjectPolicy
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
        return $user->hasPermission('type-project-views');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TypeProject $typeProjects)
    {
//        return $user->hasPermission('type-project-add');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('type-project-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TypeProject $typeProjects)
    {
        return $user->hasPermission('type-project-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TypeProject $typeProjects)
    {
        return $user->hasPermission('type-project-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TypeProject $typeProjects)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeProject  $typeProjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TypeProject $typeProjects)
    {
        //
    }
}
