@extends('layouts.bladeApp')

@section('content')

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
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
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Заполните поля</h3>
                                        </div>
                                        <form method="post" action="{{ route('createGroupStore') }}">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Название группы</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Пример названия группы" name="group_name">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Создать</button>
                                            </div>
                                        </form>
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
