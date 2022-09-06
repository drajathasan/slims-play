import {createApp} from 'vue';
import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router'
import {createPinia} from 'pinia'
import VueSplide from '@splidejs/vue-splide'

// Css
import '@splidejs/vue-splide/css';

// Section
import PlayMain from './sections/play-main.vue';
import PlayDetail from './sections/play-detail.vue';
import PlayAuthor from './sections/play-author.vue';
import PlaySearch from './sections/play-search.vue';

const routes = [
  { path: '/', component: PlayMain, props: true},
  { path: '/detail/:id', component: PlayDetail, props: true},
  { path: '/author/:name', component: PlayAuthor, props: true},
  { path: '/search/', component: PlaySearch, props: true},
]

const router = createRouter({
    history: createWebHashHistory('/'),
    routes
})

const app = createApp({components: {PlayMain}})
const pinia = createPinia()

app.use(VueSplide)
app.use(router)
app.use(pinia)
app.mount('#app')