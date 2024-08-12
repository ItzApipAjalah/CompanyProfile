<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin;
use App\Models\Visitor;
use App\Models\Produk;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    public function dashboard_admin()
    {
        // Get the date with the maximum number of visitors
        $visitsPerDay = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderByDesc('total')
            ->first();

        $maxVisitsPerDay = $visitsPerDay ? $visitsPerDay->total : 0;

        // Get the total number of unique visitors
        $totalVisitors = Visitor::count();

        // Get the total number of products
        $totalProducts = Produk::count();

        // Get the total number of blog posts
        $totalBlogPosts = BlogPost::count();

        $maxVisitors = 50000;  // Example max value for progress calculation

        $admin = auth()->user();

        return view('admin.dashboard', compact('admin', 'totalVisitors', 'maxVisitsPerDay', 'totalProducts', 'totalBlogPosts', 'maxVisitors'));
    }


}
