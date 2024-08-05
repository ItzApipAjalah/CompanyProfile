<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Profile;
use App\Models\Team;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::limit(8)->get();
        $posts = BlogPost::all();
        return view('home', compact('produks' , 'posts'));
    }

    public function profile()
    {
        $teams = Team::all();
        $profiles = Profile::all();
        return view('profile', compact('teams', 'profiles'));
    }

    public function blog()
    {
        return view('blog.index');
    }
}
