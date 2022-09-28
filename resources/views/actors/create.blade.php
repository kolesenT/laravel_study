@extends('layout');

@section('title', 'Create Actor')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif
    <div class="container">
        <div class="row">
            <form action="{{route('actors.create')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.surname') }}</label>
                    <input value="{{ old ('surname') }}" name="surname" type ="text" class="form-control @error('surname') is-invalid @enderror">
                    @error('surname')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old ('name') }}" name="name" type ="text" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.patronymic') }}</label>
                    <input value="{{ old ('patronymic') }}" name="patronymic" type ="text" class="form-control @error('patronymic') is-invalid @enderror">
                    @error('patronymic')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.date_of_birth') }}</label>
                    <input value="{{ old ('date_of_birth') }}" name="date_of_birth" type ="date" class="form-control @error('date_of_birth') is-invalid @enderror">
                    @error('date_of_birth')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('validation.attributes.heigth') }}</label>
                    <input value="{{ old ('heigth') }}" name="heigth" type ="number" class="form-control @error('heigth') is-invalid @enderror">
                    @error('heigth')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
