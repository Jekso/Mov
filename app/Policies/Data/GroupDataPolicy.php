<?php

namespace App\Policies\Data;

use App\User;
use App\Data;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the data.
     *
     * @param  \App\User  $user
     * @param  \App\Data  $data
     * @return mixed
     */
    public function update(User $user, Data $data)
    {
        return $user->is_owner($data);
    }

    /**
     * Determine whether the user can delete the data.
     *
     * @param  \App\User  $user
     * @param  \App\Data  $data
     * @return mixed
     */
    public function delete(User $user, Data $data)
    {
        return $user->is_owner($data);
    }
}
