<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Page;
use App\Models\Category;

class BlogController extends Controller
{
    public function home()
    {
        $posts = Post::take(5)
            ->latest()
            ->where('status', 'published')
            ->get();

        return view('blog.home', ['posts' => $posts]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();

        return view('blog.post', ['post' => $post]);
    }

    public function posts()
    {
        $posts = Post::latest()->where('status', 'published')->paginate(10);

        return view('blog.posts', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $posts = Post::search($request->search)
            ->latest()
            ->where('status', 'published')
            ->paginate(10);

        $keyword = $request->search ? $request->search : null;

        return view('blog.posts', ['posts' => $posts, 'keyword' => $keyword]);
    }

    public function keyword($key)
    {
        $posts = Post::keyword($key)
            ->latest()
            ->where('status', 'published')
            ->paginate(10);

        return view('blog.posts', ['posts' => $posts, 'keyword' => $key]);
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'published')->firstOrFail();

        return view('blog.page', ['page' => $page]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::where('category_id', $category->id)
            ->latest()
            ->where('status', 'published')
            ->paginate(10);

        return view('blog.category', ['posts' => $posts, 'category' => $category]);
    }

    public function categories()
    {
        $categories = Category::all();

        return view('blog.categories', ['categories' => $categories]);
    }

    public function about()
    {
        return view('blog.about');
    }
}
