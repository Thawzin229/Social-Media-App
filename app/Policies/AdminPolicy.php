<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Admin $admin): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        $admin1 =$user->email === "admin@gmail.com";
        $admin2 =$user->email === "superadmin@gmail.com";
        $admin3 =$user->email === "subadmin@gmail.com";
        return $admin1 || $admin2 || $admin3;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Admin $admin): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Admin $admin): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Admin $admin): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Admin $admin): bool
    {
        //
    }
}
