@extends('layouts.app', ['title' => 'Edit Post'])

@section('content')
    <div class="panel">
        <h1>Edit Post</h1>

        @include('posts.partials.errors')

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            @include('posts.partials.form')

            <button type="submit">Perbarui</button>
            <a href="{{ route('posts.show', $post) }}" class="button secondary">Batal</a>
        </form>
    </div>
@endsection
