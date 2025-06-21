<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function category(Category $category)
    {
        $posts = $category->posts;

        $headlines = $posts->take(3);
        $recommended = $posts->skip(3)->take(5);
        $posts = $posts->skip(13);

        return view('categories.posts', compact(
            'category',
            'headlines',
            'recommended',
            'posts'
        ));
    }

    // Buat o fungsi baru namanya show
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
