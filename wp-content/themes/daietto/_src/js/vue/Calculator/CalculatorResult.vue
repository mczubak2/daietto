<template>
  <div class="calculator__card">
    <div 
      v-if="dailyCalories" 
      class="calculator__cardResult">
      <h1 class="calculator__cardTitle">
        Your calculated needs.
      </h1>
      <div class="calculator__cardCalories">
        {{ dailyCalories }}cal
      </div>
      <h1 class="calculator__cardTitle calculator__cardTitle--footer">
        Thank you for using our calculator!
      </h1>
    </div>
    <div 
      v-else 
      class="calculator__cardNotReady">
      <h1 class="calculator__cardTitle calculator__cardTitle--lessSpace">
        Please provide your data to fields...
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
    dailyCalories: {
      type: Number,
      required: true
    }
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