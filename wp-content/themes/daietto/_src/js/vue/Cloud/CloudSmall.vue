<template>
  <transition name="fadeSlide">
    <div class="cloudSmall"
      v-if="show">
      <div class="cloudSmall__inner">
        <div class="cloudSmall__title">
          {{cloud.title}}
        </div>
        <ul class="cloudSmall__properties"
          :key="componentKey">
          <li class="cloudSmall__property"
            v-for="( item ) in cloud.properties"
            :key="item.category">
            <div class="cloudSmall__value"
              :class="{ 'cloudSmall__value--calories': !item.unit }">
              {{ item.value }}{{ item.unit }}
            </div>
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
    
  },
  methods: {

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