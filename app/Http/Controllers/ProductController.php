<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        $admin = auth()->user();
        return view('produks.index', compact('produks', 'admin'));
    }

    public function create()
    {
        $admin = auth()->user();
        return view('produks.create', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        Produk::create([
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
        ]);

        return redirect()->route('produks.index')->with('success', 'Produk created successfully.');
    }

    public function show($id)
    {
        $product = Produk::findOrFail($id);
        return view('produks.show', compact('product'));
    }

    public function edit(Produk $produk)
    {
        $admin = auth()->user();
        return view('produks.edit', compact('produk', 'admin'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'image',
            'description' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $produk->thumbnail = $thumbnailPath;
        }

        $produk->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('produks.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk deleted successfully.');
    }
}
