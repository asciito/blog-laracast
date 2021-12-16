<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->simplePaginate(6),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show ', [
            'post' => $post,
        ]);
    }

    public function category(Category $category)
    {
        return view('posts.index', [
            'posts' => $category->posts,
        ]);
    }
}
