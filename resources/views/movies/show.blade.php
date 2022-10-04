@extends('layout')

@section('title', 'Show movie')

@section('content')
    <div class="container">
        <h3>{{$movie->title}}</h3>
        <br>
        <h4>Film genre</h4>
        @foreach($movie->genres as $genre)
            <h5>#{{$genre->title}}</h5>
        @endforeach
        <br>
        <h4>Cast</h4>
        @foreach($movie->actors as $actor)
            <h5>#{{ $actor->name }} {{ $actor->surname }}</h5>
        @endforeach
        <br>
        <p>{!! nl2br(strip_tags($movie->description)) !!}</p>
        <h5>Author: {{$movie->user->name}}</h5>
        <h6>Date added: {{$movie->created_at?->format('Y/m/d')}}</h6>
    </div>

@endsection
