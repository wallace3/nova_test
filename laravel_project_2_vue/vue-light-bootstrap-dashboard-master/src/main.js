import Vue from "vue";
import VueRouter from "vue-router";
import App from "./App.vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

// LightBootstrap plugin
import LightBootstrap from "./light-bootstrap-main";

// router setup
import routes from "./routes/routes";

import "./registerServiceWorker";
// plugin setup
Vue.use(VueRouter);
Vue.use(LightBootstrap);
Vue.use(VueAxios, axios);

// configure router
const router = new VueRouter({
  routes, // short for routes: routes
  linkActiveClass: "nav-item active",
  scrollBehavior: (to) => {
    if (to.hash) {
      return { selector: to.hash };
    } else {
      return { x: 0, y: 0 };
    }
  },
});

// check logged in user

router.beforeEach(function (to, from, next) {
  console.log('beforeEach', to.path + ' - Auth: ' + localStorage.usertoken)
  if ((to.path !== '/login' && to.path !== 'login') && !localStorage.usertoken) {
    next({ path: '/login' })
  } else if ((to.path === '/login' || to.path === 'login') && localStorage.usertoken) {
    next({ path: '/' })
  } else {
    next()
  }
})

/* eslint-disable no-new */
new Vue({
  el: "#app",
  render: (h) => h(App),
  router,
});
