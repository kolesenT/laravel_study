@extends('layout')

@section('title', 'Show actor')

@section('content')
    <div class="container">
        <h3>{{$actor->surname}}</h3>
        <h3>{{$actor->name}}</h3>
        <h3>{{$actor->patronymic}}</h3>
        <h3>{{$actor->date_of_birth->format('Y/m/d')}}</h3>
        <h3>{{$actor->heigth}}</h3>
        <h4>{{$actor->created_at?->format('Y/m/d')}}</h4>
        <h5>Автор: {{ auth()->user()->name }}</h5>
    </div>

@endsection
