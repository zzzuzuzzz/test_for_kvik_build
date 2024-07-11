@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">Nina Mcintire</h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <div class="d-flex justify-content-around">
                            <form action="{{ route('logout') }}" method="POST" class="text-center">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Выход</button>
                            </form>
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="post">
                                    <div class="container-fluid">
                                        <h2 class="text-center display-4">Введите индефикатор группы</h2>
                                        <div class="row justify-content-center">
                                                <form action="{{ route('enterToGroup') }}" method="post" class="w-100">
                                                    @csrf
                                                    <div class="input-group w-100">
                                                        <input type="number" class="form-control form-control-lg" placeholder="1234567890" name="group_id">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-lg btn-default"></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @if (session('status'))
                                                <div class="alert alert-danger w-75 mt-3">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
