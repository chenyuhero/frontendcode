// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import AV from 'leancloud-storage'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'

Vue.use(ElementUI)

var APP_ID = 'hTmHIWs46U02Jg0i3XaaH6Ad-gzGzoHsz';
var APP_KEY = 'Dhu9v1gFUx8AzW6BduGAY1GH';

AV.init({
  appId: APP_ID,
  appKey: APP_KEY
});


Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})
