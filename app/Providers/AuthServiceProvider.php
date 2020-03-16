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

        Gate::define('admin',function($user){
            if($user->permission == 0){
                return true;
            }
            return false;
        });
        Gate::define('employee',function($user){
            if($user->permission == 0){
                return true;
            }
            if($user->permission == 1){
                return true;
            }
            return false;
        });
        Gate::define('accountant',function($user){
            if($user->permission == 0){
                return true;
            }
            if($user->permission == 2){
                return true;
            }
            return false;
        });
    }
}
