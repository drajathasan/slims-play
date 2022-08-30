import {createApp} from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router'

// Section
import PlayMain from './sections/play-main.vue';

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
  { path: '/', component: PlayMain },
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = createRouter({
    history: createWebHashHistory('/'),
    routes
})

const base = `<router-view/>`

const app = createApp({
    template: base
})
app.use(router)
app.mount('#app')