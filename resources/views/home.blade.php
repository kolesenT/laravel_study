@extends('layout')

@section('title', 'Главная')

@section('content')
    <div class="container">
        @if(!auth()->check())
        <a href="{{route('sing-up.Form')}}">Регистрация</a>
        <br>
        <a href="{{route('login')}}">Войти</a>
        <br>
        @endif
    </div>

@endsection
