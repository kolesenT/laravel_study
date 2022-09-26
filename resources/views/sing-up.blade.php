@extends('layout')

@section('title', 'Sing Up')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">Error!</div>
        @endif
        <form action="{{route('sing-up')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('validation.attributes.name') }}</label>
                <input value="{{ old ('name') }}" name="name" type ="text" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('validation.attributes.email') }}</label>
                <input value="{{ old ('email') }}" name="email" type ="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('validation.attributes.password') }}</label>
                <input value="{{ old ('password') }}" name="password" type ="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('validation.attributes.password_confirmation') }}</label>
                <input value="{{ old ('password_confirmation') }}" name="password_confirmation" type ="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-check">
                <label> <input class="form-check-input" type="checkbox" name="site_policy" @error('site_policy') is-invalid @enderror">Вы соглашаетесь с политикой сайта</label>
                @error('site_policy')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <br>
            <button class="btn btn-primary" type="submit"> Регистрироваться</button>
        </form>
    </div>
@endsection
