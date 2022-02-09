<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;

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

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show ', [
            'post' => $post,
        ]);
    }

    public function store()
    {
        // Validate the data
        $attributes = request()->validate([
            'title'     => 'required',
            'slug'      => 'required|unique:posts,slug',
            'thumbnail' => 'required|image',
            'excerpt'   => 'required',
            'body'      => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/')->with('success', 'You have created a new Post!');
    }

    public function category(Category $category)
    {
        return view('posts.index', [
            'posts' => $category->posts,
        ]);
    }
}
