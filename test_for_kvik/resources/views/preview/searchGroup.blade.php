@extends('layouts.bladeApp')

@section('content')

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        @if($user->premium == 1)
                            <h5 class="profile-username text-center" style="color: gold">Premium</h5>
                        @endif
                        <p class="text-muted text-center">{{ $user->email }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Всего групп</b> <a class="float-right">{{ count($group_list) }}</a>
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
                                        <h2 class="text-center display-4">Введите идентификатор группы</h2>
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
                                            @if (session('badStatus'))
                                                <div class="alert alert-danger w-75 mt-3">
                                                    {{ session('badStatus') }}
                                                </div>
                                            @elseif(session('goodStatus'))
                                                <div class="alert alert-success w-75 mt-3">
                                                    {{ session('goodStatus') }}
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
