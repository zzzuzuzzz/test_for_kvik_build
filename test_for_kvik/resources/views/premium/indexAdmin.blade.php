@extends('premium.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Календарь</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Создать задачу</h3>
                                </div>
                                <div class="card-body">
                                    <input id="new-event-title" type="text" class="form-control" placeholder="Название события">
                                    <textarea id="new-event-description" class="form-control mt-2" placeholder="Описание события"></textArea>
                                    <input id="new-event-data" type="date" class="form-control mt-2" placeholder="Дата начала">
                                    <label class="text-center w-100">Дата начала события</label>
                                    <input id="new-event-dead-line" type="date" class="form-control mt-2" placeholder="Конечный срок">
                                    <label class="text-center w-100">Дата окончания события</label>
                                    <button id="add-new-event" type="button" class="btn btn-primary mt-2">Добавить событие</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <section class="popup">--}}
{{--            <div class="container-fluid">--}}
{{--                <!-- Small boxes (Stat box) -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="card">--}}
{{--                            --}}{{--                            <div class="card-header d-flex p-3">--}}
{{--                            --}}{{--                                <div class="mr-3">--}}
{{--                            --}}{{--                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Редактировать</a>--}}
{{--                            --}}{{--                                </div>--}}
{{--                            --}}{{--                                <form action="{{ route('admin.user.delete', $user->id) }}" method="post">--}}
{{--                            --}}{{--                                    @csrf--}}
{{--                            --}}{{--                                    @method('delete')--}}
{{--                            --}}{{--                                    <input type="submit" class="btn btn-danger" value="Удалить">--}}
{{--                            --}}{{--                                </form>--}}
{{--                            --}}{{--                            </div>--}}

{{--                            <div class="card-body table-responsive p-0">--}}
{{--                                <table class="table table-hover text-nowrap">--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Название задания</td>--}}
{{--                                        <td>{{ $task->title }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Описание задания</td>--}}
{{--                                        <td>{{ $task->description }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Дата начала задания</td>--}}
{{--                                        <td>{{ $task->date_create }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Последний срок задания</td>--}}
{{--                                        <td>{{ $task->dead_line }}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Статус задания</td>--}}
{{--                                        <td>{{ $task->status_id }}</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.row -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </section>--}}
    </div>
</div>
@endsection
