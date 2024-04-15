<?php

namespace App\Policies;

use App\Models\Spot;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\Response;

class SpotPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        // \Gate::allowIf(true);
        // \Gate::denyIf(true);
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        //
        // \Gate::allowIf(false);
        // \Gate::denyIf(true);
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        return true;
        //App\Models\Role
        Gate::allowIf(function (){
            return User::isAdminitrative(); 
        });
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Spot $spot): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Spot $spot): bool
    {
        //
        if($user->role == 1) return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Spot $spot): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Spot $spot): bool
    {
        //
    }
}
