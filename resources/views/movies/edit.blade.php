@extends('layout')

@section('title', 'Edit Movie')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('movies.edit', ['movie' => $movie->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.title') }}</label>
                    <input value="{{ old ('title', $movie->title) }}" name="title" type ="text" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                <h5>Film genre</h5>
                    @foreach($genres as $genre)
                        <div class="form-check">
                            <input type="checkbox" name="genres[]" value="{{$genre->id}}" class="form-check-input"
                                   @if($movie->genres->contains('id', $genre->id))checked @endif>
                            {{$genre->title}}
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="form-group">
                <h5>Cast</h5>
                    @foreach($actors as $actor)
                        <div class="form-check">
                            <input type="checkbox" name="actors[]" value="{{$actor->id}}" class="form-check-input"
                                   @if($movie->actors->contains('id', $actor->id))checked @endif>
                            {{$actor->surname }}{{ $actor->name }}
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.year') }}</label>
                    <input value="{{ old ('year', $movie->year) }}" name="year" type ="text" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">{{ __('validation.attributes.description') }}</label>
                    <textarea name="description" rows="3"
                              class="form-control @error('text') is-invalid @enderror">{{ old('description', $movie->description) }}</textarea>
                    @error('text')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>

@endsection
