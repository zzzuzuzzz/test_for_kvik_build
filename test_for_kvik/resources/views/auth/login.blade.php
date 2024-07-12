@extends('layouts.bladeApp')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{ route('welcome') }}" class="h1" style="text-decoration: none"><b>Task Sprint</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Авторизация</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary btn-block">Войти</button>
                            </div>
                            <a href="{{ route('register') }}" class="text-center mt-3">Еще нет аккаунта?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
