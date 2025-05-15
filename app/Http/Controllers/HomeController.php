<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'headlines' => Post::query()->oldest()->limit(3)->get(),
            'trending' => Post::query()->latest()->limit(5)->get(),
            'mostPopular' => Post::query()->limit(5)->get(),
            'posts' => Post::query()->limit(10)->get(),
        ]);
    }
}
