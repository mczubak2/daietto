import Vue from 'vue';

import Calculator from '@/Calculator/Calculator.vue';
import Generator from '@/Generator/Generator.vue';

Vue.component('v-calculator', Calculator);
Vue.component('v-generator', Generator);

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