@extends('layout')

@section('title','Main')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8">
            @if($movies->isEmpty())
                <h2>Movie not found</h2>
            @endif
            @foreach($movies as $movie)
                <article class="mb-3">
                    <h2 class="mb-1">{{$movie->title}}</h2>
                    <p class="mb-1 text-muted">{{$movie->created_at->format('j F Y')}}  <br> by {{$movie->user->name}} </p>
                    <p class="mb-1">
                        @foreach($moviee->genres as $genre)
                            <span># {{$genre->title}}</span>
                        @endforeach
                    </p>
                    <p>{{$movie->short_description}}</p>
                </article>
            @endforeach
            <div class="flex.justify-content-center"></div>
            {!! $articles->links() !!}
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">
{{--                <form action="{{route('main')}}">--}}
{{--                    <div class="input-group">--}}
{{--                        <input class="form-control" type="text" placeholder="Title" name="title"--}}
{{--                               value="{{ request()->get('title')}} ">--}}
{{--                    </div>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <div class="form-check">--}}
{{--                            <input type="checkbox" name="categories[]" value="{{$category->id}}"--}}
{{--                                   @if(in_array($category->id, request()->get('categories', []))) checked @endif>--}}
{{--                            {{ $category->name }}--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    <button class="btn btn-primary">Seach</button>--}}
{{--                </form>--}}
            </ul>
        </div>
    </div>
@endsection
