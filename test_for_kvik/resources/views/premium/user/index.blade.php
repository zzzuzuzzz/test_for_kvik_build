@extends('premium.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Участники группы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="">Главная</a> / Участники группы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Имя пользователя</th>
                                        <th>Почта пользователя</th>
                                        <th>Статус пользователя</th>
                                        <th>Действие с пользователем</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->group_role == 'admin' ? 'Администратор' : 'Обычный пользователь' }}</td>
                                            @if($user->group_role == 'user')
                                                @if($user->entered == 1)
                                                    <td>
                                                        <form action="{{ route('premium.admin.users.delete', ['user_id' => $user->user_id, 'group_id' => $user->group_id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="submit" class="btn btn-danger" value="Удалить пользователя">
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('premium.admin.users.patch', ['user_id' => $user->user_id, 'group_id' => $user->group_id]) }}" method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="submit" class="btn btn-primary" value="Добавить пользователя">
                                                        </form>
                                                    </td>
                                                @endif
                                            @endif
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
    </div>
    </div>
    <!-- /.content -->
@endsection
