<?php

namespace App\Providers;

use App\Data;
use App\Group;
use App\Lounge;
use App\Question;
use App\Assignment;
use App\DataComment;
use App\LoungeComment;
use App\QuestionComment;
use App\AssignmentComment;
use App\Policies\GroupPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\Data\GroupDataPolicy;
use App\Policies\Data\DataCommentPolicy;
use App\Policies\Lounge\GroupLoungePolicy;
use App\Policies\Lounge\LoungeCommentPolicy;
use App\Policies\Question\GroupQuestionPolicy;
use App\Policies\Question\QuestionCommentPolicy;
use App\Policies\Assignment\GroupAssignmentPolicy;
use App\Policies\Assignment\AssignmentCommentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Group::class => GroupPolicy::class,
        Lounge::class => GroupLoungePolicy::class,
        LoungeComment::class => LoungeCommentPolicy::class,
        Data::class => GroupDataPolicy::class,
        DataComment::class => DataCommentPolicy::class,
        Question::class => GroupQuestionPolicy::class,
        QuestionComment::class => QuestionCommentPolicy::class,
        Assignment::class => GroupAssignmentPolicy::class,
        AssignmentComment::class => AssignmentCommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
