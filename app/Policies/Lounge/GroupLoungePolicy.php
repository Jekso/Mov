<?php

namespace App\Policies\Lounge;

use App\User;
use App\Lounge;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupLoungePolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the lounge.
     *
     * @param  \App\User  $user
     * @param  \App\Lounge  $lounge
     * @return mixed
     */
    public function update(User $user, Lounge $lounge)
    {
        return $user->is_owner($lounge);
    }

    /**
     * Determine whether the user can delete the lounge.
     *
     * @param  \App\User  $user
     * @param  \App\Lounge  $lounge
     * @return mixed
     */
    public function delete(User $user, Lounge $lounge)
    {
        return $user->is_owner($lounge);
    }
}
