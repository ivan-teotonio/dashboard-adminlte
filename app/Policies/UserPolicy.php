<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user)
    {
        return $user
            ->roles() // Observe os parênteses aqui
            ->where('name', 'admin')
            ->exists();
    }
    
}
