@extends('layout');

@section('title', 'Create Movie')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif
    <div class="container">
        <div class="row">
            <form action="{{route('movies.create')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.title') }}</label>
                    <input value="{{ old ('title') }}" name="title" type ="text" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.year') }}</label>
                    <input value="{{ old ('year') }}" name="year" type ="text" class="form-control @error('year') is-invalid @enderror">
                    @error('year')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">{{ __('validation.attributes.description') }}</label>
                    <textarea name="description" rows="3"
                              class="form-control @error('text') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
