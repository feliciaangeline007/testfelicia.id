<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        Comment::create($validated);

        return back()->with('status', 'Comment added.');
    }
}
