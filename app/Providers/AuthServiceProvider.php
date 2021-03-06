<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('check-admin', function($user){
            return($user->role== 'admin');
        });

        Gate::define('check-pembeli', function($user){
            return($user->role== 'pembeli');
        });

        Gate::define('add-cart-permission', function($user){
            return($user->role== 'pembeli');
        });
    }
}
