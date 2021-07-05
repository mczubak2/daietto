<template>
  <div class="calculator__card">
    <div 
      v-if="dailyCalories" 
      class="calculator__cardResult">
      <h1 class="calculator__cardTitle">
        {{ resultContent.header }}
      </h1>
      <div class="calculator__cardCalories">
        {{ dailyCalories }}{{ resultContent.unit }}
      </div>
      <h1 class="calculator__cardTitle calculator__cardTitle--footer">
        {{ resultContent.footer }} <span class="calculator__cardTitleIcon">🖐</span>
      </h1>
    </div>
    <div 
      v-else 
      class="calculator__cardNotReady">
      <h1 class="calculator__cardTitle calculator__cardTitle--lessSpace">
        {{ resultContent.empty }}
      </h1>
      <span 
        @click="$emit('backToFirstStep', true)"
        class="calculator__cardIcon calculator__cardIcon--alone">
        👈
      </span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CalculatorResult',
  props: {
    resultContent: {
      type: Object,
      required: true
    },
    dailyCalories: {
      type: Number,
      required: true
    },
  },
  data() {
    return {
      weight: 0
    }
  },
}
</script>

<style>

</style>