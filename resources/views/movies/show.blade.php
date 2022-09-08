@extends('layout')

@section('title', 'Show movie')

@section('content')
    <div class="container">
        <h3>{{$movie->title}}</h3>
        <h4>{{$movie->created_at?->format('Y/m/d')}}</h4>
        <p>{!! nl2br(strip_tags($movie->description)) !!}</p>
    </div>

@endsection
