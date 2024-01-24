<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employer Register</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            color: #1a202c;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-radius: 0.5rem;
        }

        h1 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #2d3748;
        }

        form {
            display: grid;
            gap: 1rem;
        }

        label {
            font-size: 0.875rem;
            color: #4b5563;
        }

        input {
            padding: 0.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.25rem;
            width: 100%;
        }

        button {
            padding: 0.75rem;
            background-color: #4299e1;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #66CCFF;
        }

        .msg {
            color: #8ca9d5;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #8ca9d5;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>REGISTER</h1>

    @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif

    <form action="{{ url('/register') }}" method="post">
        @csrf
        <label for="user">USERNAME</label>
        <input type="text" id="user" name="user" required>
        <label for="pass">PASSWORD</label>
        <input type="password" id="pass" name="pass" required>
        <button type="submit">REGISTER</button>
        <a href="{{ url('/login') }}"><p class="msg">Have an account? Log In</p></a>
    </form>
</div>
</body>
</html>
