<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function edit(User $user) : Response
    {
        return $user->type === 'teacher'
            ? Response::allow()
            : Response::deny('For teachers only');
    }
}