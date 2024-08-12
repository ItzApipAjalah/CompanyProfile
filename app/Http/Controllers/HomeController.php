<?php

// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Team;
use App\Models\BlogPost;
use App\Services\TranslationService;

class HomeController extends Controller
{
    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    public function index()
    {
        $produks = Produk::limit(6)->get();
        $categorys = Category::all();
        $posts = BlogPost::all();
        return view('home', compact('produks', 'posts', 'categorys'));
    }

    public function profile()
    {
        $teams = Team::all();
        $profiles = Profile::all();
        $language = app()->getLocale();

        foreach ($profiles as $profile) {
            if ($language !== 'id') {
                // Translate 'tentang' in chunks if it exceeds 500 characters
                $profile->tentang = $this->translateInChunks($profile->tentang, 'id', $language);
                // Translate 'visi' in chunks if it exceeds 500 characters
                $profile->visi = $this->translateInChunks($profile->visi, 'id', $language);
                // Translate 'misi' in chunks if it exceeds 500 characters
                $profile->misi = $this->translateInChunks($profile->misi, 'id', $language);
            } else {
                // If language is Indonesian, keep the original text
                $profile->tentang = $profile->tentang;
                $profile->visi = $profile->visi;
                $profile->misi = $profile->misi;
            }
        }

        return view('profile', compact('teams', 'profiles'));
    }

        private function translateInChunks($text, $sourceLang, $targetLang)
    {
        $chunkSize = 500; // Maximum characters per chunk
        $translatedText = '';
        $chunks = str_split($text, $chunkSize);

        foreach ($chunks as $chunk) {
            $translatedText .= $this->translationService->translate($chunk, $sourceLang, $targetLang);
        }

        return $translatedText;
    }

    public function blog()
    {
        $posts = BlogPost::all();
        return view('blog', compact('posts'));
    }

    public function produks()
    {
        $produks = Produk::all();
        return view('produk', compact('produks'));
    }

}

