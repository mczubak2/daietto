<template>
  <div class="cloudSmall">
    <div class="cloudSmall__inner">
      <div class="cloudSmall__title">{{cloud.title}}</div>
      <ul class="cloudSmall__properties">
        <li class="cloudSmall__property"
        v-for="( item, index ) in cloud.properties"
        :key="item.category"
        >
          <div class="cloudSmall__value"
            :class="{ 'cloudSmall__value--calories': !item.unit }"
          >{{ values[index] }}{{ item.unit }}</div>
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
      values: []
    }
  },
  created() {

    console.log(this.cloud.properties);
    

    this.cloud.properties.forEach(() => this.values = [...this.values, 0])

    this.cloud.properties.forEach(( element, index ) => {
      setTimeout(() => {
      
        if ( this.values[index] < element ) {
          element += 0.5
          console.log('je');
        }
        
      }, 500)
    })
  }
}
</script>