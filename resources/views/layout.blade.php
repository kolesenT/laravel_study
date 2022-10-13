<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home.about')}}">О нас</a>
        </li>
        @if(auth()->check())
            <li class="nav-item">
                <a class="nav-link" href="{{route('movies')}}">Фильмы</a>
            </li>
        @can('viewAny', App\Models\Genre::class)
            <li class="nav-item">
                <a class="nav-link" href="{{route('genres')}}">Жанры</a>
            </li>
            @endcan
        @can('viewAny', App\Models\Actor::class)
            <li class="nav-item">
                <a class="nav-link" href="{{route('actors')}}">Актеры</a>
            </li>
            @endcan
            <li>
                <a class="nav-link" href="{{route('login-history')}}">История</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Обратная связь</a>
        </li>
    </ul>
    @if(auth()->check())
        <div class="navbar-text text-end">
            <form action="{{route('logout')}}" method="post" class="form-check-inline">
                @csrf
                <p class="d-inline-block">Вы вошли как {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <button class="btn btn-danger">Выход</button>
            </form>
        </div>
    @endif
</div>

@include('flash-messages')
 @yield('content')
</body>
</html>

