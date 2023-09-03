<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function home()
    {
        $posts = Post::take(5)->latest()->get();

        return view('blog.home', ['posts' => $posts]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('blog.post', ['post' => $post]);
    }
}
