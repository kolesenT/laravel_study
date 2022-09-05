@extends('layout')

@section('title')
    Обратная связь
@endsection

@section('content')
    <br>
    <div class="container">
        <form class="col">
            <div class="col-6">
                <label for="inputName" class="form-label">Имя</label>
                <input type="text" class="form-control" id="inputName" placeholder="Введите Ваше имя">
            </div>
            <br>
            <div class="col-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Ваш email">
            </div>
            <br>
            <div class="col-6">
                <label for="inputTel" class="form-label">Номер телефона</label>
                <input type="text" class="form-control" id="inputTel" placeholder="Введите Ваш телефонный номер">
            </div>
            <br>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>

@endsection
