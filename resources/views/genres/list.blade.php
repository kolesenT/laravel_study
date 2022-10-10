@extends('layout')

@section('title', 'Genres List')

@section('content')
    <br>
    <ul class="nav">
        @can('create', App\Models\Genre::class)
        <li class="nav-item">
            <a class="nav-link" href="{{route('genres.createForm')}}">Добавить жанр</a>
        </li>
        @endcan
    <div class="container">
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название жанра</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <th scope="row">{{$genre->id}}</th>
                    <td>{{$genre-> title}}</td>
                    <td>{{$genre->created_at?->format('Y/m/d')}}</td>
                    <td>
                        @can('view')
                        <a href="{{route('genres.show', ['genre' => $genre->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        @endcan
                        @can('update')
                        <a href="{{route('genres.edit', ['genre' => $genre->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('delete')
                        <form action="{{route('genres.delete', ['genre' => $genre->id])}}" method="post" class="d-inline">
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
        {!! $genres->links() !!}
    </div>

@endsection






