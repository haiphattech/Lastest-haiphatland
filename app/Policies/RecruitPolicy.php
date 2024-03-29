<?php

namespace App\Policies;

use App\Models\Recruit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecruitPolicy
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
        return $user->hasPermission('recruit-views');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Recruit $recruits)
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
        return $user->hasPermission('recruit-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Recruit $recruits)
    {
        return $user->hasPermission('recruit-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Recruit $recruits)
    {
        return $user->hasPermission('recruit-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Recruit $recruits)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recruit  $recruits
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Recruit $recruits)
    {
        //
    }
}
