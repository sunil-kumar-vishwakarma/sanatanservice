<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport::routes();
    
        // Set token expiration (1 day)
        // Passport::tokensExpireIn(Carbon::now()->addDays(1));
    
        // Set refresh token expiration (7 days)
        // Passport::refreshTokensExpireIn(Carbon::now()->addDays(7));
    
        // Set personal access token expiration (1 year)
        // Passport::personalAccessTokensExpireIn(Carbon::now()->addYear(1));

        //
    }
}
