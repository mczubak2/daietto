<template>
  <transition name="fadeSlide">
    <div class="cloudBig"
      :key="componentKey"
      v-if="show">
      <div class="cloudBig__inner">
        <div class="cloudBig__content">
          <div class="cloudBig__results">
            <div class="cloudBig__title">{{ cloud.title }}</div>
            <ul class="cloudBig__properties">
              <li class="cloudBig__property">
                <div class="cloudBig__category">
                  {{ cloud.properties.lost.title }}
                </div>
                <div class="cloudBig__value">
                  {{ cloud.properties.lost.value }} {{ cloud.properties.lost.unit }}
                </div>
              </li>
              <li class="cloudBig__property">
                <div class="cloudBig__category">
                  {{ cloud.properties.level.title }}
                </div>
                <div class="cloudBig__value">
                  level {{ cloud.properties.level.value }} 
                </div>
              </li>
            </ul>
          </div>
          <div class="cloudBig__circle">
            <div class="cloudBig__circleChart" data-pie-chart>
              <div class="cloudBig__circleContent">
                <p class="cloudBig__circleContentText cloudBig__circleContentText--value">{{ cloud.properties.ring.value }}</p>
                <p class="cloudBig__circleContentText">{{ cloud.properties.ring.unit }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="cloudBig__footer">
          <span>{{ cloud.footer.content }}</span> 
          <a class="cloudBig__footerLink" 
            :href="cloud.footer.highlighted.url">
            {{ cloud.footer.highlighted.title }}
          </a>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: 'CloudBig',
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
  transform: translate(20%, -50%);
}
</style>