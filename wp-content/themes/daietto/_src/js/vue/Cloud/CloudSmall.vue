<template>
  <div class="cards">
    <input type="number" step="1" />
  </div>
</template>

<script>
export default {
  name: 'Cards',
  props: {
    cards:  {
      type: JSON,
      required: true,
    },
  },
  data() {
    return {
      name: true
    }
  },
  created() {
    console.log(this.cards);
  }
}
</script>

<style>

</style>