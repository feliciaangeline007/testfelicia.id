<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #f5f7fb;
            color: #222;
        }

        .login {
            width: min(420px, calc(100% - 40px));
            background: #fff;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            padding: 24px;
        }

        label {
            display: block;
            margin: 14px 0 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }

        button {
            margin-top: 18px;
            border: 0;
            border-radius: 6px;
            padding: 10px 14px;
            background: #2563eb;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
        }

        .error {
            color: #b91c1c;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                <strong>Error!</strong> {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
