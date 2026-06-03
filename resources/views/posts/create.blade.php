@extends('layouts.app', ['title' => 'Buat Post Baru'])

@section('content')
    <div class="panel">
        <h1>Buat Post Baru</h1>

        @include('posts.partials.errors')

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            @include('posts.partials.form')

            <button type="submit">Simpan</button>
            <a href="{{ route('posts.index') }}" class="button secondary">Batal</a>
        </form>
    </div>
@endsection
