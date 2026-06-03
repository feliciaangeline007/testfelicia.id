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
        <h2>Output Raw Menggunakan &#123;!! !!&#125;</h2>
        <p>{!! $post->content !!}</p>
    </div>
@endsection
