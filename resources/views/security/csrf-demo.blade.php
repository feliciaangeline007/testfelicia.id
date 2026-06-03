@extends('layouts.app', ['title' => 'Demo CSRF'])

@section('content')
    <div class="panel">
        <h1>Demo CSRF Protection</h1>
        <p>Form ini sengaja tidak memakai token CSRF untuk menunjukkan error 419 Page Expired seperti Q1.</p>

        <form method="POST" action="{{ route('csrf-demo.store') }}">
            {{-- @csrf --}}

            <label for="title">Judul</label>
            <input id="title" type="text" name="title" value="Post tanpa CSRF" required>

            <label for="content">Konten</label>
            <textarea id="content" name="content" required>Form ini sengaja tidak membawa CSRF token.</textarea>

            <button type="submit">Kirim Tanpa CSRF</button>
        </form>
    </div>
@endsection
