<template>
  <div class="generator__component" data-aos="fade-up">
    <ul v-if="meals">
      <li v-for="item in meals" :key="item.id">
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script>
import { api } from "../../helpers/api";

export default {
  name: "Generator",
  props: {},
  data() {
    return {
      meals: [],
      caloricNeeds: 0,
    };
  },
  methods: {
    async getMeals() {
      return await api
        .get("/api/v1/meals", {})
        .then((response) => {
          return (response = response.data.data.items);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    window.onstorage = async () => {
      this.caloricNeeds = localStorage.getItem("calculatedCalories");

      if (this.caloricNeeds) {
        this.meals = await this.getMeals();

        this.meals.forEach((element) => {
          console.log(element);
        });
      }
    };
  },
};
</script>

<style>
</style>