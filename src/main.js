import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
//for the @vueuse/motion
import { MotionPlugin } from "@vueuse/motion";

const app = createApp(App)

app.use(router)
//for the @vueuse/motion
app.use(MotionPlugin)

app.mount('#app')
