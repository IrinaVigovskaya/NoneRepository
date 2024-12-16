<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Nette\Utils\Paginator;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create-task', function (User $user){
            return true;
        });

        //
    }
}
