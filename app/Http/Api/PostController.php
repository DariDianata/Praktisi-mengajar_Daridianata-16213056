<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();

        $response = [
            'message' => 'berhasil menampilkan data',
            'data' => $posts,
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'string|required',
        //     'thumbnail' => 'image|file|max:2048',
        //     'body' => 'string|required'
        // ]);

        $post = new Post();
        $post->title = $request->title;
        $post->thumbnail = $request->file('thumbnail')->store('post');
        $post->body = $request->body;
        $post->save();

        $response = [
            "message" => "Berhasil membuat post",
            "data" => $post
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        return response()->json([
            "message" => "Berhasil",
            "data" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->title = $request->input('title');

            //check param thumbnail if exists
            if ($request->has('thumbnail')) {
                $post->thumbnail = $request->file('thumbnail')->store('post');
            }

            $post->body = $request->input('body');
            $post->save();

            return response()->json([
                'message' => "Berhasil",
                'data' => $post,
            ]);

        }

        return response()->json([
            'message' => "gagal dalam mengubah data karena id tidak ditemukan",
            'data' => null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();

            return response()->json([
                'message' => 'berhasil dihapus',
                'data' => ''
            ]);
        }

        return response()->json([
            'message' => 'data tidak ditemukan',
            'data' => ''
        ]);
    }
}
