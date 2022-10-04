@extends('layout')

@section('title', 'Actors List')

@section('content')
    <br>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('actors.createForm')}}">Добавить актера</a>
        </li>
    <div class="container">
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Рост (см)</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($actors as $actor)
                <tr>
                    <th scope="row">{{$actor->id}}</th>
                    <td>{{$actor-> surname}}</td>
                    <td>{{$actor-> name}}</td>
                    <td>{{$actor-> patronymic}}</td>
                    <td>{{$actor->date_of_birth?->format('Y/m/d')}}</td>
                    <td>{{$actor-> heigth}}</td>
                    <td>
                        <a href="{{route('actors.show', ['actor' => $actor->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        <a href="{{route('actors.edit', ['actor' => $actor->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{route('actors.delete', ['actor' => $actor->id])}}" method="post" class="d-inline">
                            @csrf
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="flex.justify-content-center"></div>
        {!! $actors->links() !!}
    </div>

@endsection






