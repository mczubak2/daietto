<template>
  <transition name="fadeSlide">
    <div class="cloudSmall"
      v-if="show">
      <div class="cloudSmall__inner">
        <div class="cloudSmall__title">{{cloud.title}}</div>
        <ul class="cloudSmall__properties"
          :key="componentKey">
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
  </transition>
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
  },
  mounted() {
    this.show = true;
  },
}
</script>

<style lang="scss" scoped>
.fadeSlide-enter-active, .fadeSlide-leave-active {
  transition: .5s;
}
.fadeSlide-enter, .fadeSlide-leave-to {
  opacity: 0;
  left: 100%
}
</style>