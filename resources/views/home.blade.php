@extends('layout')

@section('title', 'Главная')

@section('content')
    <div class="container">
        @if(!auth()->check())
        <a href="{{route('sing-up.Form')}}">Регистрация</a>
        <br>
        <a href="{{route('login')}}">Войти</a>
        <br>
        @else
            <div class="row mt-4">
                <div class="col-md-8">
                    @if($movies->isEmpty())
                        <h2>Movie not found</h2>
                    @endif
                    @foreach($movies as $movie)
                        <article class="mb-3">
                            <h2 class="mb-1">{{$movie->title}}</h2>
                            <p class="mb-1 text-muted"> Relese date: {{$movie->year}}  <br> by {{$movie->user->name}} </p>
                            <p class="mb-1">
                                @foreach($movie->genres as $genre)
                                    <span># {{$genre->title}}</span>
                                @endforeach
                            </p>
                            <br>
                            <p>{{$movie->short_description}}</p>
                        </article>
                    @endforeach
                    <div class="flex.justify-content-center"></div>
                    {!! $movies->links() !!}
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <form action="{{route('home')}}">
                             <h4>Title</h4>
                             <input class="form-control" type="text" placeholder="Title" name="title"
                                    value="{{ request()->get('title')}} ">
                            <h4>Release date</h4>
                            <input class="form-control" type="number" placeholder="Release date" name="year"
                                    value="{{request()->get('year')}}">
                            <h4>Genre</h4>
                            @foreach($genres as $genre)
                                <div class="form-check">
                                    <input type="checkbox" name="genres[]" value="{{$genre->id}}"
                                           @if(in_array($genre->id, request()->get('genres', []))) checked @endif>
                                    {{ $genre->title }}
                                </div>
                            @endforeach
                            <br>
                            <h4>Actors</h4>
                            @foreach($actors as $actor)
                                <div class="form-check">
                                    <input type="checkbox" name="actors[]" value="{{$actor->id}}"
                                           @if(in_array($actor->id, request()->get('actors', []))) checked @endif>
                                    {{ $actor->surname }}
                                </div>
                            @endforeach
                            <br>
                            <button class="btn btn-primary">Seach</button>
                        </form>
                    </ul>
                </div>
            </div>
        @endif

    </div>

@endsection
