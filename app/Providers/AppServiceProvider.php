<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
        // Define a custom rate limiter for login attempts
        RateLimiter::for('login', function ($request) {
            // Define rate limit of 5 attempts per minute
            return Limit::perMinute(5)->by($request->ip());
        });
    }
}
