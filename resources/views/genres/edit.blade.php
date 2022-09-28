@extends('layout')

@section('title', 'Edit Genres')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('genres.edit', ['genre' => $genre->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.title') }}</label>
                    <input value="{{ old ('title', $genre->title) }}" name="title" type ="text" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
