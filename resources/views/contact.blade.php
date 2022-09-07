@extends('layout')

@section('title')
    Обратная связь
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif
    <br>
    <div class="container">
        <form class="col" action="{{route('contact.store')}}" method="post">
            @csrf
            <div class="col-6">
                <label for="inputName">{{ __('validation.attributes.name') }}</label>
                <input value="{{old('name')}}" name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="inputName" placeholder="Введите Ваше имя">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <br>
            <div class="col-6">
                <label for="inputEmail4">{{ __('validation.attributes.email') }}</label>
                <input value="{{old('email')}}" name="email" type="email" class="form-control  @error('email') is-invalid @enderror" id="inputEmail4" placeholder="Ваш email">
                @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <br>
            <div class="col-6">
                <label for="inputTel">{{ __('validation.attributes.number') }}</label>
                <input value="{{old('number ')}}" name="number" type="text" class="form-control  @error('number') is-invalid @enderror" id="inputTel" placeholder="Введите Ваш телефонный номер">
                @error('number')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <br>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>

@endsection
