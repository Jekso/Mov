<?php

namespace App\Providers;

use App\Data;
use App\Group;
use App\Lounge;
use App\Question;
use App\Assignment;
use App\Policies\GroupPolicy;
use App\Policies\GroupDataPolicy;
use App\Policies\GroupLoungePolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\GroupQuestionPolicy;
use App\Policies\GroupAssignmentPolicy;
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
        Data::class => GroupDataPolicy::class,
        Question::class => GroupQuestionPolicy::class,
        Assignment::class => GroupAssignmentPolicy::class,
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
