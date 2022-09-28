@extends('layout')

@section('title', 'Movies List')

@section('content')
    <br>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('movies.createForm')}}">Добавить фильм</a>
        </li>
    <div class="container">
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название фильма</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <th scope="row">{{$movie->id}}</th>
                    <td>{{$movie-> title}}</td>
                    <td>{{$movie->created_at?->format('Y/m/d')}}</td>
                    <td>
                        <a href="{{route('movies.show', ['movie' => $movie->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        @can('update', $movie)
                        <a href="{{route('movies.edit', ['movie' => $movie->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('delete', $movie)
                        <form action="{{route('movies.delete', ['movie' => $movie->id])}}" method="post" class="d-inline">
                            @csrf
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="flex.justify-content-center"></div>
        {!! $movies->links() !!}
    </div>

@endsection






