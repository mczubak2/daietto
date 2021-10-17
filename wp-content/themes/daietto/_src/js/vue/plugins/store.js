import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    calculatedCalories: 0
  },
  mutations: {
    setCalculatedCalories(state, payload) {
      state.calculatedCalories = payload;
    }
  }
})