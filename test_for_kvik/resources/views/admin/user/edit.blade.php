@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Главная</a> / <a href="{{ route('admin.user.index') }}">Пользователи</a> / Редактирование пользователя</li>
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
            <div>
                <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Имя пользователя">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Почта пользователя">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="premium">
                            <option value="0" selected>Обычный пользователь</option>
                            <option value="1">Премиум</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="role">
                            <option value="user" selected>Обычный пользователь</option>
                            <option value="admin">Администратор</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
