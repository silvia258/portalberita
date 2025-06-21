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
    public function index(Request $request)
    {
        $posts = Post::query();

        if ($request->has('search')) {
            $posts->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            $posts->where('category_id', $request->category);
        }

        return $posts->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug'],
            'image' => ['required', 'image', 'max:2048'],
            'author' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'content' => ['required', 'string'],
        ]);

        $request->merge([
            'image' => $request->file('image')->store('', 'public'),
        ]);

        $post = Post::create($request->all());

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post->load('category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,' . $post->id],
            'image' => ['nullable', 'image', 'max:2048'],
            'author' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'content' => ['required', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('', 'public');
        }

        $post->update($validated);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
