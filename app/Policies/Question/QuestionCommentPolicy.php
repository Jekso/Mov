<?php

namespace App\Policies\Question;

use App\User;
use App\QuestionComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the questionComment.
     *
     * @param  \App\User  $user
     * @param  \App\QuestionComment  $questionComment
     * @return mixed
     */
    public function view(User $user, QuestionComment $questionComment)
    {
        //
    }

    /**
     * Determine whether the user can create questionComments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the questionComment.
     *
     * @param  \App\User  $user
     * @param  \App\QuestionComment  $questionComment
     * @return mixed
     */
    public function update(User $user, QuestionComment $questionComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the questionComment.
     *
     * @param  \App\User  $user
     * @param  \App\QuestionComment  $questionComment
     * @return mixed
     */
    public function delete(User $user, QuestionComment $questionComment)
    {
        //
    }
}
