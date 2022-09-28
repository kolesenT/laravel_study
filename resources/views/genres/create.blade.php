@extends('layout');

@section('title', 'Create Genre')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif
    <div class="container">
        <div class="row">
            <form action="{{route('genres.create')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.title') }}</label>
                    <input value="{{ old ('title') }}" name="title" type ="text" class="form-control @error('title') is-invalid @enderror">
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
