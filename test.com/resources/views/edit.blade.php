<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit posting</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            color: #1a202c;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #4299e1;
            color: #fff;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            margin-right: 1.5rem;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .container {
            max-width: 100%;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            margin: 0 auto;
            position: relative;
            margin-top: 1rem;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #2d3748;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        form {
            display: grid;
            gap: 1rem;
        }

        label {
            font-size: 1rem;
            color: #4a5568;
        }

        input, textarea, select {
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
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2c5282;
        }

        .index-button {
            padding: 0.75rem;
            background-color: #4299e1;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .index-button:hover {
            background-color: #2c5282;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div>
        <a href="/">internToYou</a>
    </div>
    <div class="top-right-buttons">
        <a href="/" class="index-button">BACK</a>
    </div>
</div>
<div class="container">
    <h1>Edit Posting</h1>

    <div class="form-container">
        <form method="post" action="{{ url('/edit/'.$internship->id) }}" enctype="multipart/form-data">
            @csrf
            <label for="title">Internship Position</label>
            <input type="text" name="title" value="{{ $internship->title }}" required>

            <label for="content">Internship Detail</label>
            <textarea name="content" rows="18" required>{{ $internship->content }}</textarea>

            <label for="major">Study Category</label>
            <select name="major" required>
                <option value="it" {{ $internship->major === 'it' ? 'selected' : '' }}>Information Technology</option>
                <option value="accounting" {{ $internship->major === 'accounting' ? 'selected' : '' }}>Accounting</option>
                <option value="business" {{ $internship->major === 'business' ? 'selected' : '' }}>Business</option>
            </select>

            <label for="photo">Upload office photo</label>
            <input type="file" name="photo" accept="image/*">

            <button type="submit">SAVE</button>
        </form>
    </div>
</div>
</body>
</html>
