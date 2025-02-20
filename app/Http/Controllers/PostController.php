<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->get(); 
        return response()->json([
            'data' => $posts,
        ],200);
    }
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
    
        return response()->json([
            'data' => $post,
        ], 201);
    }
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return response()->json([$post]);
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
    
        return response()->json([
            'data' => $post,
        ],200);
    }
    public function destroy(Post $post)
    {
        $post->delete();   
        return response()->json([
        ],200);
    }
}
