<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Session;
use Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-task', function(User $user, Task $task){
            return $user->is_admin or $task->task_description == null;
        });
    }
}
