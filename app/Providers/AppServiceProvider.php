<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('modify-students', function(User $user) {
            return $user->type === 'teacher'
                ? Response::allow()
                : Response::deny('For teachers only');
        });

        # Register Policy
        // Gate::policy(User::class, UserPolicy::class);
        // Route::post('/students', 'store')->name('students.store')->can('edit', User::class); // use this in route
    }
}
