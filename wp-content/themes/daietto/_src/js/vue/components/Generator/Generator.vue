<template>
  <transition name="fadeSlide">
    <div class="generator__component" v-if="dietMeals">
      <div class="generator__inner">
        <ul class="generator__list">
          <li class="generator__item" v-for="item in dietMeals" :key="item.id">
            {{ item.title }}
          </li>
        </ul>
      </div>
    </div>
  </transition>
</template>

<script>
import { api } from "../../../helpers/api";
import { mapState } from 'vuex';

export default {
  name: "Generator",
  props: {},
  data() {
    return {
      allMeals: [],
      dietMeals: [],
    };
  },
  computed: {
    ...mapState([
      'calculatedCalories'
    ])
  },
  watch: {
    calculatedCalories(newVal) {
      if (newVal) return this.setValues();
    }
  },
  methods: {
    async getMeals() {
      return await api
        .get("/api/v1/meals", {})
        .then((response) => {
          console.log(response.data.data.items);
          return response.data.data.items;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    generateDiet(meals, needs, number) {
      let selectedMeals = [];
      const caloriesPerMeal = Math.round(needs / number);

      for (let i = 0; i < number; i++) {

        let fittedMealIndex = 0;
        let diff;

        meals.forEach((element, index) => {

          const currentCalories = parseInt(element.macronutrients.calories);
          const currentDiff = Math.abs(caloriesPerMeal - currentCalories);

          diff = index === 0 || diff === undefined ? currentDiff : diff;
          
          if (currentDiff < diff) {
            diff = currentDiff;
            fittedMealIndex = index;
          }
        })

        selectedMeals = [...selectedMeals, ...meals.splice(fittedMealIndex, 1)];
      }

      return selectedMeals;
    },
    async setValues() {
      this.allMeals = await this.getMeals();
      this.dietMeals = this.generateDiet(this.allMeals, this.calculatedCalories, 3);
    }
  },
};
</script>
