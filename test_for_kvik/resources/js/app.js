import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue'
import router from './router'
import axios from "axios";

const app = createApp(App)

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);


// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

app.use(router)
app.config.globalProperties.axios = axios
app.mount('#app');




