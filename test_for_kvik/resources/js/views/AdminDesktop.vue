<template>

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
          <h5 class="info">{{ user_name }}</h5>
          <div class="info">{{ user_email }}</div>
          <div class="info">{{ group_name }}</div>
            <a href="/home" class="btn btn-primary w-50">Выход</a>
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
                    <label>Дата события</label>
                    <input id="new-event-dead-line" type="date" class="form-control mt-2" placeholder="Конечный срок">
                    <label>Крайний срок</label>
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
      <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Управление участниками группы</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th>Участник</th>
                      <th>Почта</th>
                      <th>Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in this.users">
                      <td>{{ user.user_id.name }}</td>
                      <td>{{ user.user_id.email }}</td>
                      <td>
                          <template v-if="user.entered">
                            <button @click="UserDelete(user.id)" class="btn btn-danger">Удалить пользователя из группы</button>
                          </template>
                          <template v-else>
                            <button @click="UserEnter(user.id)" class="btn btn-primary">Добавить пользователя</button>
                          </template>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </section>
    </div>
  </div>
  <Popup v-if="popupTrigger.buttonTrigger"
         :TogglePopup ="() => TogglePopup('buttonTrigger')">
    <h2>{{ popupTrigger.title}}</h2>
    <p>{{ popupTrigger.description }}</p>
    <button class="btn btn-primary" @click="TaskDone(popupTrigger.id)">Выполнено</button>
    <button class="btn btn-danger" @click="TaskDelete(popupTrigger.id)">Удалить событие</button>
  </Popup>
</template>

<script>
import {Cookie} from "../assets/Cookie.js"
import axios from "axios";
import Popup from "../components/Popup.vue";
import {ref} from "vue";

const url = window.location.pathname.split('/')
const group_id = url[3]
const user_name = Cookie.getCookie('user_name')
const user_email = Cookie.getCookie('user_email')
let group_name;

if (url[1] === 'vue') {
    if (Cookie.getCookie('group_' + group_id + '[1]')) {
        if (Cookie.getCookie('group_' + group_id + '[3]') !== 'admin') {
            location.href = '/home'
        }
        group_name = Cookie.getCookie('group_' + group_id + '[2]')
    } else {
        location.href = '/home'
    }
}

export default {
  components: {Popup},
  setup (){
    const popupTrigger = ref({
      buttonTrigger: false,
      title: '',
      description: '',
      id: ''
    })

    function TogglePopup (trigger, title, description, id) {
      popupTrigger.value[trigger] = !popupTrigger.value[trigger]
      popupTrigger.value.title = title
      popupTrigger.value.description = description
      popupTrigger.value.id = id
    }

    function TaskDone(id) {
      axios.post('/api/tasks/done/' + id)
          .then(() => {
            location.reload()
      })
    }
    function TaskDelete(id) {
      axios.delete('/api/tasks/' + id)
          .then(() => {
            location.reload()
          })
    }
    function UserEnter(id) {
      axios.post('/api/users/' + id)
          .then(() => {
            location.reload()
          })
    }
    function UserDelete(id) {
      axios.delete('/api/users/' + id)
          .then(() => {
            location.reload()
          })
    }

    return {
      Popup,
      popupTrigger,
      TogglePopup,
      TaskDone,
      TaskDelete,
      UserDelete,
      UserEnter
    }
  },
  data() {
    return {
      user_name: user_name,
      user_email: user_email,
      group_name: group_name,
      group_id: group_id,
      users: ref('')
    }
  },
  mounted() {
    this.getTasks(this.group_id, this.TogglePopup)
    this.getUsers(this.group_id)
  },
  methods: {
    getUsers(url) {
      this.axios.get('/api/users/' + url)
          .then(res => {
            this.users = res.data.data
          })
    },
    getTasks(url, popup) {
      this.axios.get('/api/tasks/' + url)
          .then(res => {
              console.log(res)
            $(function () {
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
                  console.log(info);
                  popup('buttonTrigger', info.event._def.title, info.event._def.extendedProps.description, info.event._def.publicId)
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

              window.cal = {
                calendar: calendar
              }

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
                }, url)
                $('#new-event-title').val('')
                $('#new-event-description').val('')
                $('#new-event-data').val('')
                $('#new-event-dead-line').val('')
              })
            })
          })
    }
  },
  name: "AdminDesktop",
}


</script>

<style scoped>
.brand-text {
  color: white;
  text-align: center;
}
.info {
  color: white;
}
</style>
