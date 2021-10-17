<template>
  <div class="calculator__card">
    <div v-if="dailyCalories" class="calculator__cardInner">
      <h1 class="calculator__cardTitle">
        {{ resultContent.header }}
      </h1>
      <div class="calculator__cardCalories">
        {{ dailyCalories }}{{ resultContent.unit }}
      </div>
      <button
        class="calculator__cardButton calculator__cardButton--moreSpace"
        @click="setCalculatedCalories(dailyCalories)"
      >
        {{ resultContent.button }}
      </button>
      <h1 class="calculator__cardTitle calculator__cardTitle--footer">
        {{ resultContent.footer }}
        <span class="calculator__cardTitleIcon">🖐</span>
      </h1>
    </div>
    <div v-else>
      <h1 class="calculator__cardTitle calculator__cardTitle--lessSpace">
        {{ resultContent.empty }}
      </h1>
      <span
        @click="$emit('firstStep', true)"
        class="calculator__cardIcon calculator__cardIcon--alone"
      >
        👈
      </span>
    </div>
  </div>
</template>

<script>
import { mapMutations } from 'vuex';

export default {
  name: "CalculatorResult",
  props: {
    resultContent: {
      type: Object,
      required: true,
    },
    dailyCalories: {
      type: Number,
      required: true,
    },
  },
  methods: {
    ...mapMutations({
      setCalculatedCalories: 'setCalculatedCalories',
    }),
  },
};
</script>