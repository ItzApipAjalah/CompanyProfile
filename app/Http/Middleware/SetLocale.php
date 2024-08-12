<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Set locale default ke 'id' jika tidak ada preferensi pengguna
        $locale = Session::get('locale', 'id');
        App::setLocale($locale);

        return $next($request);
    }
}

