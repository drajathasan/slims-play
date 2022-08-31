import {createApp} from 'vue';
import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router'

// Section
import PlayMain from './sections/play-main.vue';

const routes = [
  { path: '/', component: PlayMain, props: true},
]

const router = createRouter({
    history: window.location.pathname === '/' ? createWebHistory() : createWebHashHistory('/'),
    routes
})

const app = createApp({components: {PlayMain}})

app.use(router)
app.mount('#app')