<?php

namespace App\Policies\Assignment;

use App\User;
use App\AssignmentComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the assignmentComment.
     *
     * @param  \App\User  $user
     * @param  \App\AssignmentComment  $assignmentComment
     * @return mixed
     */
    public function view(User $user, AssignmentComment $assignmentComment)
    {
        //
    }

    /**
     * Determine whether the user can create assignmentComments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the assignmentComment.
     *
     * @param  \App\User  $user
     * @param  \App\AssignmentComment  $assignmentComment
     * @return mixed
     */
    public function update(User $user, AssignmentComment $assignmentComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the assignmentComment.
     *
     * @param  \App\User  $user
     * @param  \App\AssignmentComment  $assignmentComment
     * @return mixed
     */
    public function delete(User $user, AssignmentComment $assignmentComment)
    {
        //
    }
}
