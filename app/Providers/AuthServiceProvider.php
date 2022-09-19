<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\PostPolicy;
use Carbon\Carbon;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Posts;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Posts::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
        ** define roles
        */
        Gate::define('isSuperAdmin', function ($user) {
            $isExist = $user->roles->search(function ($item) {
                return $item->name === 'super_admin';
            });
            if($isExist !== false){
                return true;
            }
            return false;
        });
        Gate::define('isManager', function ($user) {
            return $user->roles->search(function ($item) {
                return $item->name === 'manager';
            }) !== false;
        });
        Gate::define('isUser', function ($user) {
            return $user->roles->search(function ($item) {
                return $item->name === 'user';
            }) !== false;
        });
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        //
    }
}
