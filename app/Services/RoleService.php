<?php

namespace App\Services;

use App\Models\User;

class RoleService
{
    public function isAdmin(User $user): bool
    {
        if (method_exists($user, 'hasRole')) {
            return $user->hasRole('admin');
        }

        // fallback: check an is_admin attribute if present
        return (bool) ($user->is_admin ?? false);
    }

    public function hasRole(User $user, string $role): bool
    {
        if (method_exists($user, 'hasRole')) {
            return $user->hasRole($role);
        }

        return false;
    }

    public function assignRole(User $user, string $role): void
    {
        if (method_exists($user, 'assignRole')) {
            $user->assignRole($role);
        }
    }
}
