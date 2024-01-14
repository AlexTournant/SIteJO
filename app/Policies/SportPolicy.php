<?php

namespace App\Policies;

use App\Models\Sport;
use App\Models\User;

class SportPolicy
{
    function update(User $user, Sport $sport) {
        if ($user->admin=1){
            return true;
        }
        return $user->id === $sport->user_id;
    }

    function delete(User $user, Sport $sport) {
        if ($user->admin=1){
            return true;
        }
        return $user->id === $sport->user_id;
    }

    function create(User $user) {
        return true;
    }

}
