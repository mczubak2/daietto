<template>
  <div class="calculator__card">
    <h1 class="calculator__cardTitle">
      Choose your gender.
    </h1>
    <div class="calculator__cardContent">
      <span 
        class="calculator__cardIcon"
        :class="{'calculator__cardIcon--active': !gender}"
        @click="gender = false">
        👦
        <div 
          class="calculator__cardIconCaption">
          male
        </div>
      </span>
      <input 
        class="calculator__cardRadio"
        :class="{ 'calculator__cardRadio--checked': gender }"
        @click="gender = !gender"
        v-model="gender"
        type="checkbox"> 
      <span 
        class="calculator__cardIcon"
        :class="{'calculator__cardIcon--active': gender}"
        @click="gender = true">
        👩
        <div 
          class="calculator__cardIconCaption">
          female
        </div>
      </span>
    </div>

    <button 
      class="calculator__cardButton"
      @click="sendData(gender)">
      next
    </button>
  </div>
</template>

<script>
export default {
  name: 'CalculatorGender',
  data() {
    return {
      gender: false,
    }
  },
  methods: {
    sendData(value) {
      this.$emit('nextStep', true);
      this.$emit('genderValue', value);
    }
  }
}
</script>

<style lang="scss">

</style>