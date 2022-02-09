<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        // Validate the data
        request()->validate([
            'body' => 'required'
        ], [
           'body.required' => 'The comment is required'
        ]);

        // Create the comment in the post
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body'      => request('body'),
        ]);

        return back();
    }
}
