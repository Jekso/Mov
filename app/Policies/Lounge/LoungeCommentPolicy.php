<?php

namespace App\Policies\Lounge;

use App\User;
use App\LoungeComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoungeCommentPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the loungeComment.
     *
     * @param  \App\User  $user
     * @param  \App\LoungeComment  $loungeComment
     * @return mixed
     */
    public function update(User $user, LoungeComment $loungeComment)
    {
        return $user->is_owner($loungeComment);
    }

    /**
     * Determine whether the user can delete the loungeComment.
     *
     * @param  \App\User  $user
     * @param  \App\LoungeComment  $loungeComment
     * @return mixed
     */
    public function delete(User $user, LoungeComment $loungeComment)
    {
        return $user->is_owner($loungeComment);
    }
}
