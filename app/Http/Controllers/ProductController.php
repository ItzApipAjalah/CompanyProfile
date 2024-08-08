<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $produks = Produk::with('category')->get();
        $categories = Category::with('produks')->get();
        $admin = auth()->user();
        return view('produks.index', compact('produks' , 'categories', 'admin'));
    }

    public function create()
    {
        $categories = Category::all();
        $admin = auth()->user();
        return view('produks.create', compact('categories', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        Produk::create([
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('produks.index')->with('success', 'Produk created successfully.');
    }

    public function show(Produk $produk)
    {
        return view('produks.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $categories = Category::all();
        $admin = auth()->user();
        return view('produks.edit', compact('produk', 'categories', 'admin'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'image',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $produk->thumbnail = $thumbnailPath;
        }

        $produk->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('produks.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk deleted successfully.');
    }
}
