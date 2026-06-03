@extends('layouts.app', ['title' => 'Daftar Post'])

@section('content')
    <div class="panel">
        <h1>Daftar Post</h1>
        <p>Gunakan halaman ini untuk membuat post dan mencoba demo XSS pada halaman detail.</p>
        <a href="{{ route('posts.create') }}" class="button">Buat Post Baru</a>
    </div>

    @forelse ($posts as $post)
        <div class="panel">
            <h2>{{ $post->title }}</h2>
            @foreach ($post->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
            @endforeach
            <p>{{ \Illuminate\Support\Str::limit($post->content, 140) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="button secondary">Lihat</a>
            <a href="{{ route('posts.edit', $post) }}" class="button secondary">Edit</a>
        </div>
    @empty
        <div class="panel">
            <p>Belum ada post.</p>
        </div>
    @endforelse

    {{ $posts->links() }}
@endsection
