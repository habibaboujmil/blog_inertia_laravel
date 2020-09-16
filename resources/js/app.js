import { InertiaApp } from '@inertiajs/inertia-vue'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import Vue from 'vue'
import Vuetify from 'Vuetify';
// import Vuetify from 'vuetify/lib'

Vue.mixin({ methods: { route: window.route } })

Vue.use(InertiaApp)
Vue.use(Vuetify, {
  iconfont: 'md'
})

const app = document.getElementById('app')

new Vue({
  vuetify : new Vuetify({
    icons: {
      iconfont: 'mdiSvg'
    },
  }),
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => import(`./components/${name}`).then(module => module.default),
    },
  }),
}).$mount(app)
