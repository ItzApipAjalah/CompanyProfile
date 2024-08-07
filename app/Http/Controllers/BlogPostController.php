<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog-posts.index', compact('posts'));
    }

    public function create()
    {
        return view('blog-posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'image|nullable'
    ]);

    $content = $request->input('content');

    if ($request->hasFile('image')) {
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }

    BlogPost::create([
        'title' => $request->input('title'),
        'content' => $content,
        'image' => $fileNameToStore
    ]);

    return redirect()->route('blog-posts.index')->with('success', 'Post Created');
}


    public function show($title)
    {
        $post = BlogPost::where('title', $title)->firstOrFail();
        return view('blog.index', compact('post'));
    }


    public function edit($id)
    {
        $post = BlogPost::find($id);
        return view('blog-posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|nullable'
        ]);

        $post = BlogPost::findOrFail($id);

        // Update title and content
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            if ($post->image && $post->image !== 'noimage.jpg') {
                Storage::delete('public/images/' . $post->image);
            }

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/images', $fileNameToStore);

            $post->image = $fileNameToStore;
        }

        $post->save();

        return redirect()->route('blog-posts.index')->with('success', 'Post Updated');
    }


    public function destroy($id)
    {
        $post = BlogPost::find($id);
        $post->delete();
        return redirect()->route('blog-posts.index')->with('success', 'Post Deleted');
    }

    private function formatContent($content)
    {
        $paragraphs = explode("\n", trim($content));
        $formattedContent = '';

        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if (!empty($paragraph)) {
                $paragraph = ucfirst($paragraph);
                $formattedContent .= '<p style="text-indent: 1em; margin-bottom: 1em;">' . $paragraph . '</p>';
            }
        }

        return $formattedContent;
    }
}
