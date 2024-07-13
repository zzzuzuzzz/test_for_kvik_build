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
                                    <h3 class="card-title text-center w-100">Создать задачу</h3>
                                </div>
                                <div class="card-body">
                                    <input id="new-event-title" type="text" class="form-control" placeholder="Название события">
                                    <textarea id="new-event-description" class="form-control mt-2" placeholder="Описание события"></textArea>
                                    <input id="new-event-data" type="date" class="form-control mt-2" placeholder="Дата начала">
                                    <label class="text-center w-100">Дата начала события</label>
                                    <input id="new-event-dead-line" type="date" class="form-control mt-2" placeholder="Конечный срок">
                                    <label class="text-center w-100">Дата окончания события</label>
                                    <button id="add-new-event" type="button" class="btn btn-primary mt-2 w-100">Добавить событие</button>
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
    </div>
</div>
@endsection
