<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()->sortDesc()]);
    }

    /*
     * TODO:
     * - Change the view route
     */
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validationRules(), [
            'user_id' => auth()->user()->id
        ]));

        return redirect('/')->with('success', 'You have created a new Post!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $post->update($this->validationRules($post));

        return redirect("admin/posts/$post->slug/edit")->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'The post has been deleted!');
    }

    protected function validationRules(Post $post = null)
    {
        $post = $post ?? new Post();

        $attributes = request()->validate([
            'title'     => 'required',
            'slug'      => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => 'image',
            'excerpt'   => 'required',
            'body'      => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if (request()->hasFile('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        } else {
            unset($attributes['thumbnail']);
        }

        return $attributes;
    }
}
