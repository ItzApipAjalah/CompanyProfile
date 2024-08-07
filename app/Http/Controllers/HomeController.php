<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Team;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::limit(8)->get();
        $categorys = Category::all();
        $posts = BlogPost::all();
        return view('home', compact('produks' , 'posts', 'categorys'));
    }

    public function profile()
    {
        $teams = Team::all();
        $profiles = Profile::all();
        return view('profile', compact('teams', 'profiles'));
    }

    public function blog()
    {
        $posts = BlogPost::all();
        return view('blog', compact('posts'));
    }

    public function produks()
    {
        $produks = Produk::with('category')->get();
        $categories = Category::with('produks')->get();
        return view('produk', compact('produks' , 'categories'));
    }

}
