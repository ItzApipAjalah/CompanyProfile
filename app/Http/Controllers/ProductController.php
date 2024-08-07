<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $produks = Produk::with('category')->get();
        $categories = Category::with('produks')->get();
        return view('produks.index', compact('produks' , 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('produks.create', compact('categories'));
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
        return view('produks.edit', compact('produk', 'categories'));
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
