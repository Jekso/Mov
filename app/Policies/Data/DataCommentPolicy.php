<?php

namespace App\Policies\Data;

use App\User;
use App\DataComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the dataComment.
     *
     * @param  \App\User  $user
     * @param  \App\DataComment  $dataComment
     * @return mixed
     */
    public function view(User $user, DataComment $dataComment)
    {
        //
    }

    /**
     * Determine whether the user can create dataComments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the dataComment.
     *
     * @param  \App\User  $user
     * @param  \App\DataComment  $dataComment
     * @return mixed
     */
    public function update(User $user, DataComment $dataComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the dataComment.
     *
     * @param  \App\User  $user
     * @param  \App\DataComment  $dataComment
     * @return mixed
     */
    public function delete(User $user, DataComment $dataComment)
    {
        //
    }
}
