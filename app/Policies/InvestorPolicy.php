<?php

namespace App\Policies;

use App\Models\Investor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvestorPolicy
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
        return $user->hasPermission('investor-views');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Investor $investor)
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
        return $user->hasPermission('investor-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Investor $investor)
    {
        return $user->hasPermission('investor-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Investor $investor)
    {
        return $user->hasPermission('investor-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Investor $investor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Investor $investor)
    {
        //
    }
}
