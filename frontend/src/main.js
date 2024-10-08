// import './assets/main.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import { Modal, Checkbox, Input, Select, Avatar, Table, Card, Menu, List, Drawer, Button, message } from 'ant-design-vue'
import axios from 'axios'

import 'ant-design-vue/dist/reset.css'
import 'bootstrap/dist/css/bootstrap-grid.min.css'
import 'bootstrap/dist/css/bootstrap-utilities.min.css'
const app = createApp(App)

window.axios = axios

app.use(createPinia())
app.use(router)
app.use(Button)
app.use(Drawer)
app.use(List)
app.use(Menu)
app.use(Card)
app.use(Avatar)
app.use(Table)
app.use(Input)
app.use(Select)
app.use(Checkbox)
app.use(Modal)
app.mount('#app')
app.config.globalProperties.$message = message
