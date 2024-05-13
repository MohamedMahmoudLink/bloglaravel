<?php

namespace App\Providers;

use App\Policies\CategoryPolicy;
use App\Policies\PostPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserProfilePolicy;

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
    public function boot()
    {
        Gate::define('admin_create', [CategoryPolicy::class, 'view']);
        Gate::define('admin_create', [CategoryPolicy::class, 'create']);
        Gate::define('admin_edit', [CategoryPolicy::class, 'update']);
        Gate::define('admin_delete', [CategoryPolicy::class, 'delete']);


        
        
    Gate::define('update-user', [UserProfilePolicy::class, 'update']);







    Gate::define('post_update', [PostPolicy::class, 'update']);
    Gate::define('post_delete', [PostPolicy::class, 'delete']);
    Gate::define('restoree', [PostPolicy::class, 'restore']);
    Gate::define('forceDeletee', [PostPolicy::class, 'forceDelete']);

        Paginator::useBootstrap();
    }
}
