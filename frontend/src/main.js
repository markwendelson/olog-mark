import { createApp } from 'vue';
import App from './App.vue';
import { createPinia } from 'pinia';
import vuetify from './plugins/vuetify';
import '@mdi/font/css/materialdesignicons.css';

const app = createApp(App);

app.use(vuetify);
app.use(createPinia());

app.mount('#app');