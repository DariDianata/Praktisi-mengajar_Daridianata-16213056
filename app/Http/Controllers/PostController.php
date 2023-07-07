<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'thumbnail' => 'required|image|mimes:jpeg,png|max:2048',
            'body' => 'required|string'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('post', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        $data['title'] = Str::title($request->title);

        $post = new Post;
        $post->title = $data['title'];
        $post->thumbnail = $data['thumbnail'];
        $post->body = $data['body'];
        $post->save();

        return redirect('posts')->with('success', 'Berhasil membuat artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png|max:2048',
            'body' => 'required|string'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama
            Storage::disk('public')->delete($post->thumbnail);

            // Simpan thumbnail baru
            $thumbnailPath = $request->file('thumbnail')->store('post', 'public');
            $post->thumbnail = $thumbnailPath;
        }

        $post->body = $request->body;
        $post->save();

        return redirect('/posts')->with('success', 'Berhasil mengubah artikel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        // Hapus thumbnail
        Storage::disk('public')->delete($post->thumbnail);

        $post->delete();

        return redirect('/posts')->with('success', 'Berhasil menghapus artikel');
    }
}
