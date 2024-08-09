<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        // Check if IP already exists
        if (!Visitor::where('ip_address', $ip)->exists()) {
            // Create a new visitor entry
            Visitor::create(['ip_address' => $ip]);
        }

        return $next($request);
    }
}
