@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Администраторы</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Главная</a> / <a href="{{ route('admin.user.index') }}">Пользователи</a> / Администраторы</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Добавить</a>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary ml-2">Сбросить фильтр</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя пользователя</th>
                                    <th>Почта пользователя</th>
                                    <th>Статус пользователя</th>
                                    <th>Роль пользователя</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a></td>
                                        <td><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->email }}</a></td>
                                        <td>{{ $user->premium == 1 ? 'Премиум' : 'Обычный пользователь' }}</td>
                                        <td>{{ $user->role == 'admin' ? 'Администратор' : 'Обычный пользователь' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2">
                            {{ $users->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
