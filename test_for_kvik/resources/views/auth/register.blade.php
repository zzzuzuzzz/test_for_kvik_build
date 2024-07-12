@extends('layouts.bladeApp')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{ route('welcome') }}" class="h1" style="text-decoration: none;"><b>Task Sprint</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Регистрация</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Полное имя">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-8 ">
                                <button type="submit" class="btn btn-primary btn-block">Зарегестрироваться</button>
                            </div>
                            <a href="{{ route('login') }}" class="text-center mt-3">Уже есть аккаунт?</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
