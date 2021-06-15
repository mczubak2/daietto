<template>
  <div class="cloudSmall"
    :key="componentKey">
    <div class="cloudSmall__inner">
      <div class="cloudSmall__title">{{cloud.title}}</div>
      <ul class="cloudSmall__properties">
        <li class="cloudSmall__property"
        v-for="( item, index ) in cloud.properties"
        :key="item.category">
          <div class="cloudSmall__value"
            :class="{ 'cloudSmall__value--calories': !item.unit }">{{ values[index] }}{{ item.unit }}</div>
          <div class="cloudSmall__category">
            {{ item.category }}
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CloudSmall',
  props: {
    cloud: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      componentKey: 0,
      values: [],
      show: false
    }
  },
  created() {

    this.cloud.properties.forEach(( element, index ) => {

      let interval;
      this.values[index] = 0;
      
      const count = () => {

        if( this.values[index] < element.value ) {
          if ( element.value > 100 )
            this.values[index] += 4;
          else
            this.values[index] += 1;

          this.componentKey += 1;
          element.value = element.value;

        } else {
          clearInterval(interval);
          this.values[index] = element.value;
        }
      }

      interval = setInterval(count, 10);
    })
  }
}
</script>

<style lang="scss" scoped>

</style>