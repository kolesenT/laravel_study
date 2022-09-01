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
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('home.about')}}">О нас</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('home.contact')}}">Обратная связь</a>
    </li>
</ul>
 @yield('content')
</body>
</html>

