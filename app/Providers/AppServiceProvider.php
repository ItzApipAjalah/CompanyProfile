<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Services\TranslationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(TranslationService::class, function ($app) {
            return new TranslationService();
        });
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
