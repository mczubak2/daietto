import Vue from 'vue';
import CloudSmall from '@/Cloud/CloudSmall.vue';
import CloudBig from '@/Cloud/CloudBig.vue';

Vue.component('v-cloud-small', CloudSmall);
Vue.component('v-cloud-big', CloudBig);

const ready = (fn) => {
  if (document.attachEvent
    ? document.readyState === 'complete'
    : document.readyState !== 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
};

ready(() => {
  const vComponents = document.querySelectorAll('[data-vue-component]');
  if (vComponents.length) {
    vComponents.forEach((elem) => {
      window.App = new Vue({
        el: elem,
      });
    });
  }
});