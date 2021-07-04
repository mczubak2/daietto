import Vue from 'vue';

import Calculator from '@/Calculator/Calculator.vue';
import CalculatorGender from '@/Calculator/CalculatorGender.vue';
import CalculatorAge from '@/Calculator/CalculatorAge.vue';
import CalculatorHeight from '@/Calculator/CalculatorHeight.vue';
import CalculatorWeight from '@/Calculator/CalculatorWeight.vue';

Vue.component('v-calculator', Calculator);

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