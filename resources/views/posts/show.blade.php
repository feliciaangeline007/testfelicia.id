@extends('layouts.app', ['title' => $post->title])

@section('content')
    <div class="panel">
        <h1>{{ $post->title }}</h1>
        <p>
            <a href="{{ route('posts.edit', $post) }}" class="button secondary">Edit</a>
            <a href="{{ route('posts.index') }}" class="button secondary">Kembali</a>
        </p>

        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Hapus post ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Hapus</button>
        </form>
    </div>

    <div class="panel">
        <h2>Output Aman Menggunakan &#123;&#123; &#125;&#125;</h2>
        <p>{{ $post->content }}</p>
    </div>

    <div class="panel">
        <h2>Tags</h2>

        @forelse ($post->tags as $tag)
            <span class="tag">{{ $tag->name }}</span>
        @empty
            <p>Belum ada tag untuk post ini.</p>
        @endforelse
    </div>

    <div class="panel">
        <h2>Output Raw Menggunakan &#123;!! !!&#125;</h2>
        <p>{!! $post->content !!}</p>
    </div>

    <div class="panel">
        <h2>Komentar</h2>

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <label for="comment-content">Tulis komentar anda:</label>
            <textarea id="comment-content" name="content" required>{{ old('content') }}</textarea>

            <button type="submit">Kirim</button>
        </form>

        <strong>Comments:</strong>
        <ul>
            @forelse ($post->comments as $comment)
                <li><em>{{ $comment->content }}</em></li>
            @empty
                <li>Belum ada komentar.</li>
            @endforelse
        </ul>
    </div>
@endsection
