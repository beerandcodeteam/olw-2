<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SellerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role_id === RoleEnum::MANAGER
            || $user->role_id === RoleEnum::SELLER;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Seller $seller): bool
    {
        return $user->role_id === RoleEnum::MANAGER
            || $user->role_id === RoleEnum::SELLER;
    }

    /**
     * Determine whether the user can create models.
     */
    public function createOrUpdate(User $user): bool
    {
        return $user->role_id === RoleEnum::MANAGER
            || $user->role_id === RoleEnum::SELLER;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Seller $seller): bool
    {
        return $user->role_id === RoleEnum::MANAGER
            || $user->role_id === RoleEnum::SELLER;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Seller $seller): bool
    {
        return $user->role_id === RoleEnum::MANAGER
            || $user->role_id === RoleEnum::SELLER;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Seller $seller): bool
    {
        return $user->role_id === RoleEnum::MANAGER
            || $user->role_id === RoleEnum::SELLER;
    }
}
