<template>
  <div 
    class="calculator__card"
    :class="{'calculator__card--shake': shake}" @animationend="shake = false">
    <h1 class="calculator__cardTitle">
      {{ ageContent.header }}
    </h1>
    <div class="calculator__cardContent">
      <input
        ref="input"
        class="calculator__cardInput"
        :class="{'calculator__cardInput--invalid': errorMessage}"
        v-model="age" 
        type="text"> 
      <p class="calculator__cardErrorMessage">{{ errorMessage }}</p>
    </div>
    <button class="calculator__cardButton" @click="sendData(age)">
      {{ ageContent.button }}
    </button>
    <button class="calculator__cardLink" @click="$emit('prevStep', true)">
      {{ ageContent.link }}
    </button>
  </div>
</template>

<script>
export default {
  name: 'CalculatorAge',
  props: {
    ageContent: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      age: '',
      errorMessage: '',
      shake: false
    }
  },
  methods: {
    sendData(value) {
      
      value = parseInt(value);
      
      if ( !Number.isInteger(value) || value < 3 || value > 120) {


        if (!Number.isInteger(value)) this.errorMessage = 'Please type a number';
        if (value < 3 || value > 120) this.errorMessage = "I don't belive you";

        return this.shake = true;
      } 

      this.errorMessage = '';
      this.$emit('nextStep', true);
      this.$emit('ageValue', value);
    }
  },
  mounted() {
    this.$refs.input.focus();
  }
}
</script>