<?php

namespace App\Policies;

use App\User;
use App\Assignment;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupAssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the assignment.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function view(User $user, Assignment $assignment)
    {
        //
    }

    /**
     * Determine whether the user can create assignments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the assignment.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function update(User $user, Assignment $assignment)
    {
        //
    }

    /**
     * Determine whether the user can delete the assignment.
     *
     * @param  \App\User  $user
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function delete(User $user, Assignment $assignment)
    {
        //
    }
}
