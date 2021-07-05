<template>
  <div
    class="calculator__card"
    :class="{'calculator__card--shake': shake}">
    <h1 class="calculator__cardTitle">
      {{ heightContent.header }}
    </h1>
    <div class="calculator__cardContent">
      <input 
        ref="input"
        class="calculator__cardInput" 
        :class="{'calculator__cardInput--invalid': errorMessage}"
        v-model="height" 
        type="text"> 
      <p class="calculator__cardErrorMessage">{{ errorMessage }}</p>
    </div>
    <button 
      class="calculator__cardButton"
      @click="sendData(height)">
      {{ heightContent.button }}
    </button>
    <button 
      class="calculator__cardLink"
      @click="$emit('prevStep', true)">
      {{ heightContent.link }}
    </button>
  </div>
</template>

<script>
export default {
  name: 'CalculatorHeight',
  props: {
    heightContent: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      height: '',
      shake: false,
      errorMessage: ''
    }
  },
  methods: {
    sendData(value) {
      
      value = parseInt(value);
      
      if ( !Number.isInteger(value) || value < 50 || value > 250) {

        if (!Number.isInteger(value)) this.errorMessage = 'Please type a number';
        if (value < 50 || value > 250) this.errorMessage = "I don't belive you";

        this.shake = true;
        setTimeout(() => this.shake = false , 1000);

        return
      } 

      this.errorMessage = '';
      this.$emit('nextStep', true);
      this.$emit('heightValue', value);
    }
  },
  mounted() {
    this.$refs.input.focus();
  }
}
</script>

<style>

</style>