@extends('layout')

@section('title', 'Movies List')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Дата входа</th>
                <th scope="col">Пользователь</th>
                <th scope="col">IP</th>
            </tr>
            </thead>
            @foreach($visits as $visit)
                <tr>
                    <td>{{$visit->enter_time?->format('G:i:s Y/m/d -D')}}</td>
                    <td>{{$visit->user->name}}</td>
                    <td>{{$visit->ip}}</td>
                </tr>
            @endforeach
            <tbody>
            </tbody>
    <div>

@endsection
