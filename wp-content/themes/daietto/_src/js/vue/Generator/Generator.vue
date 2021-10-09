<template>
  <transition name="fadeSlide">
    <div class="generator__component" v-if="dietMeals">
      <ul>
        <li v-for="item in dietMeals" :key="item.id">
          {{ item.title }}
        </li>
      </ul>
    </div>
  </transition>
</template>

<script>
import { api } from "../../helpers/api";

export default {
  name: "Generator",
  props: {},
  data() {
    return {
      allMeals: [],
      dietMeals: [],
      caloricNeeds: 0,
    };
  },
  methods: {
    async getMeals() {
      return await api
        .get("/api/v1/meals", {})
        .then((response) => {
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
    }
  },
  mounted() {
    window.addEventListener('caloriesCalculated', async (event) => {
      this.caloricNeeds = event.detail.calculatedCalories;

      if (this.caloricNeeds) {r
        this.allMeals = await this.getMeals();

        this.dietMeals = this.generateDiet(this.allMeals, this.caloricNeeds, 3);
      }
    })
  },
};
</script>
