<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">Tous les posts</h1>
        <form action="{{ route('post.search') }}" method="POST" class="md-6 mt-5" id="search-form">
            <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" name="q" id="q">
        </form>
        <div id="posts" class="mt-3">
            @foreach ($posts as $post)
                <h1>{{ $post->title }}</h1> 
                <p>{{ $post->content }}</p>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>