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
                <label class="info" style="color: gold" id="group_name"></label>
                <a href="/laravel/home" class="btn btn-primary w-50">Выход</a>
            </div>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" id="navCalendar">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Календарь</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navUsers">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Участники группы</p>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@yield('content')
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

    const group_id = window.location.pathname.split('/')[5]
    let group_name = getCookie('group_' + group_id + '[2]')
    document.getElementById('group_name').textContent = group_name

    document.getElementById('navCalendar').href = 'http://localhost/laravel/premium/admin/calendar/' + group_id
    document.getElementById('navUsers').href = 'http://localhost/laravel/premium/admin/users/' + group_id

    $(function () {
        axios.get('/api/premium/tasks/' + group_id)
            .then(res => {
                console.log(res)
                function postTask(task, url) {
                    axios.post('/api/tasks/' + url, task)
                        .then(res => {
                            console.log(res)
                            calendar.addEvent({
                                id: res.data,
                                title: valTitle,
                                description: valDescription,
                                start: valData,
                                end: valDead,
                                backgroundColor: currColor,
                                borderColor: currColor,
                                allDay: true
                            })
                        })
                }

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
                    editable  : true,
                    droppable : true,
                    eventDrop: function(info) {
                        console.log(info)
                        if (!confirm("Вы уверены что хотите перенести событие?")) {
                            info.revert();
                        } else {
                            axios.patch('/api/tasks/' + info.event.id, {
                                start: info.event.start,
                                end: info.event.end
                            })
                        }
                    },
                    eventResize: function(info) {
                        if (!confirm("Вы уверены что хотите сдвинуть крайний срок события?")) {
                            info.revert();
                        } else {
                            axios.patch('/api/tasks/' + info.event.id, {
                                start: info.event.start,
                                end: info.event.end
                            })
                        }
                    },
                });
                calendar.render();


                let valTitle
                let valDescription
                let valData
                let valDead
                let currColor = 'blue'

                $('#add-new-event').click(function (e) {
                    e.preventDefault()
                    valTitle = $('#new-event-title').val()
                    valDescription = $('#new-event-description').val()
                    valData = $('#new-event-data').val()
                    valDead = $('#new-event-dead-line').val()
                    valDead = new Date(valDead)
                    valDead.setDate(valDead.getDate() + 1)
                    console.log(valDead)
                    if (valTitle.length == 0 || valDescription.length == 0 || valData.length == 0 || valDead.length == 0) {
                        return
                    }
                    postTask({
                        title: valTitle,
                        description: valDescription,
                        start: valData,
                        end: valDead,
                    }, group_id)
                    $('#new-event-title').val('')
                    $('#new-event-description').val('')
                    $('#new-event-data').val('')
                    $('#new-event-dead-line').val('')
                })
            })
    })
</script>
</body>
</html>