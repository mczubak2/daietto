<template>
  <div 
    class="calculator__card"
    :class="{'calculator__card--shake': shake}">
    <h1 class="calculator__cardTitle">
      {{ weightContent.header }}
    </h1>
    <div class="calculator__cardContent">
      <input 
        ref="input"
        class="calculator__cardInput" 
        :class="{'calculator__cardInput--invalid': errorMessage}"
        v-model="weight" 
        type="text"> 
    </div>
    <button @click="sendData(weight)" class="calculator__cardButton">
      {{ weightContent.button }}
    </button>
    <button class="calculator__cardLink">
      {{ weightContent.link }}
    </button>
  </div>
</template>

<script>
export default {
  name: 'CalculatorWeight',
  props: {
    weightContent: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      weight: '',
      shake: false,
      errorMessage: ''
    }
  },
  methods: {
    sendData(value) {
      
      value = parseInt(value);
      
      if ( !Number.isInteger(value) || value < 30 || value > 250) {

        if (!Number.isInteger(value)) this.errorMessage = 'Please type a number';
        if (value < 30 || value > 250) this.errorMessage = "I don't belive you";

        this.shake = true;
        setTimeout(() => this.shake = false , 1000);

        return
      } 

      this.errorMessage = '';
      this.$emit('calculateResult', true);
      this.$emit('weightValue', value);
    }
  },
  mounted() {
    this.$refs.input.focus();
  }
}
</script>

<style>

</style>