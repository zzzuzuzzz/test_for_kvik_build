<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PREMIUM</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .brand-text {
            color: white;
            text-align: center;
        }
        .info {
            color: white;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <h2 class="brand-text font-weight-light mt-2">Task Sprint</h2>
        <div class="sidebar">
            <div class="user-panel pb-3 mb-3 d-flex flex-column align-items-center">
                <h5 class="info">{{ $user->name }}</h5>
                <div class="info">{{ $user->email }}</div>
                <label class="info" style="color:gold" id="group_name"></label>
                <a href="/laravel/home" class="btn btn-primary w-50">Выход</a>
            </div>
        </div>
    </aside>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/main.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/locales/ru.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simondmc/popup-js@1.4.3/popup.min.js"></script>
    <script>
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }

        const group_id = window.location.pathname.split('/')[3]
        let group_name = getCookie('group_' + group_id + '[2]')
        document.getElementById('group_name').textContent = group_name

        $(function () {
            axios.get('/api/premium/tasks/' + group_id)
                .then(res => {
                    console.log(res)

                    res.data.data.forEach(function (value) {
                        value.backgroundColor = value.color.color
                        value.borderColor = value.color.color
                        value.statusId = value.color.id
                        value.color.status_bad_name ? value.statusBadName = 'Задание просрочено' : value.statusBadName = ''
                    })
                    let Calendar = FullCalendar.Calendar;
                    let calendarEl = document.getElementById('calendar');
                    let calendar = new Calendar(calendarEl, {
                        locale: 'ru',
                        headerToolbar: {
                            left  : 'prev,next today',
                            center: 'title',
                            right: ''
                        },
                        themeSystem: 'bootstrap',
                        events: res.data.data,
                        eventClick: function(info) {
                            console.log(info)
                            const myPopup = new Popup({
                                id: "my-popup",
                                title: info.event._def.title,
                                content: ``,
                                hideCallback: () => {
                                    $('.my-popup').remove()
                                },
                            });
                            let popupElement = document.querySelector(".popup-body")
                            let array = info.event._def.extendedProps.statuses;
                            let html = '<div style="display: flex; flex-direction: column"><p>Описание: '+info.event._def.extendedProps.description+'</p>' +
                                '<p>Дата начала: '+info.event.startStr+'</p>' +
                                '<p>Крайний срок: '+info.event.endStr+'</p>' +
                                '<p>'+info.event._def.extendedProps.statusBadName+'</p>' +
                                '<form id="formInPopup" style="display: flex; flex-direction: column; align-items: center;" action="/api/premium/tasks/done/'+info.event._def.publicId+'" method="post">' +
                                '<select name="statusSelect">'

                            array.forEach(function(value){
                                html += '<option value="'+value.id+'">'+value.title+'</option>';
                            });

                            html += '</select>' +
                                '<button type="submit" class="btn btn-success mt-2">Сохранить новый статус</button>' +
                                '</form></div>';

                            popupElement.innerHTML = html
                            myPopup.show();
                        },
                    });
                    calendar.render();

                })
        })
    </script>
</body>
</html>
