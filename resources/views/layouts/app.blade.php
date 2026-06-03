<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel Web Security' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f7fb;
            color: #222;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .nav a,
        .button,
        button {
            display: inline-block;
            border: 0;
            border-radius: 6px;
            padding: 9px 14px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button.secondary,
        .nav a.secondary {
            background: #475569;
        }

        .button.danger,
        button.danger {
            background: #dc2626;
        }

        .panel {
            background: #fff;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 16px;
        }

        input,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }

        input[type="checkbox"] {
            width: auto;
        }

        .checkbox-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 14px;
        }

        .checkbox-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            font-weight: normal;
        }

        .tag {
            display: inline-block;
            border-radius: 999px;
            padding: 4px 8px;
            margin: 0 6px 6px 0;
            background: #e0f2fe;
            color: #075985;
            font-size: 13px;
        }

        textarea {
            min-height: 160px;
        }

        label {
            display: block;
            margin: 14px 0 6px;
            font-weight: bold;
        }

        .error {
            color: #b91c1c;
        }

        .status {
            padding: 10px 12px;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
            margin-bottom: 16px;
        }

        pre {
            overflow: auto;
            white-space: pre-wrap;
            background: #0f172a;
            color: #e2e8f0;
            padding: 14px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <main class="container">
        <div class="nav">
            <div>
                <a href="{{ route('posts.index') }}">Posts</a>
                <a href="{{ route('csrf-demo.create') }}" class="secondary">Demo CSRF</a>
            </div>

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="danger">Logout</button>
                </form>
            @endauth
        </div>

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
