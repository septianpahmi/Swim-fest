<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function accessAdmin(User $user)
    {

        return $user->role_id === 1;
    }
    public function __construct()
    {
        //
    }
}
