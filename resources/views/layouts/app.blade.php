<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tasks for Today')</title>
</head>
<body>
    <nav>
        <a href="{{ route('welcome') }}">Welcome</a> |
        <a href="{{ route('tasks.index') }}">Task List</a> |
        <a href="{{ route('profile') }}">Profile</a> |
        <a href="{{ route('about') }}">About</a>
    </nav>

    <hr>

    <main>
        @yield('content')
    </main>
</body>
</html>