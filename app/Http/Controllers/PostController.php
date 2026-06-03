<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::orderBy('name')->get();

        return view('posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $post = Post::create($request->only(['title', 'content']));
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('posts.show', $post)
            ->with('status', 'Post berhasil dibuat.');
    }

    public function show(Post $post)
    {
        $post->load(['comments', 'tags']);

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::orderBy('name')->get();

        return view('posts.edit', compact('post', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $post->update($request->only(['title', 'content']));
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('posts.show', $post)
            ->with('status', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('status', 'Post berhasil dihapus.');
    }
}
