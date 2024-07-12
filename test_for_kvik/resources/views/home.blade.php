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

                        <form action="{{ route('logout') }}" method="POST" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Выход</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="post">
                                    <a class="btn btn-lg btn-primary w-25" href="{{ route('search') }}">Вступить в группу</a>
                                    <a class="btn btn-lg btn-info w-25" href="{{ route('premiumPreview') }}">Создать группу</a>
                                </div>
                                <div class="post">
                                @foreach($group_list as $group)
                                        @if($group->role == 'admin')
                                            <a class="btn btn-lg btn-primary w-25" href="http://127.0.0.1:8000/laravel/vue/admin/{{ $group->group_id }}">{{ $group->group_name }}</a>
                                        @else
                                            <a class="btn btn-lg btn-primary w-25" href="http://127.0.0.1:8000/laravel/vue/{{ $group->group_id }}">{{ $group->group_name }}</a>
                                        @endif
                                @endforeach
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
