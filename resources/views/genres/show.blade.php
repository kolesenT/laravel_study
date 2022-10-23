@extends('layout')

@section('title', 'Show genre')

@section('content')
    <div class="container">
        <h3>{{$genre->title}}</h3>
        <h4>{{$genre->created_at?->format('Y/m/d')}}</h4>
        <h5>Автор: {{ auth()->user()->name }}</h5>
    </div>

@endsection
