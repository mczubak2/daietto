<template>
  <div class="cloudBig"
    :key="componentKey">
    <div class="cloudBig__inner">
      <div class="cloudBig__content">
        <div class="cloudBig__results">
          <div class="cloudBig__title">{{cloud.title}}</div>
          <ul class="cloudBig__properties">
            <li class="cloudBig__property"
            v-for="( item, index ) in cloud.properties"
            :key="item.category">
              <div class="cloudBig__value"
                :class="{ 'cloudBig__value--calories': !item.unit }">{{ values[index] }}{{ item.unit }}</div>
              <div class="cloudBig__category">
                {{ item.category }}
              </div>
            </li>
          </ul>
        </div>
        <div class="cloudBig__circle">

        </div>
      </div>
      <div class="cloudBig__footer">
        <span>{{cloud.footer.content}}</span> 
        <a class="cloudBig__footerLink" 
          :href="cloud.footer.highlighted.url">
          {{cloud.footer.highlighted.title}}
        </a>
      </div>
    </div>
  </div>
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
  created() {
    console.log(this.cloud);
  }
}
</script>

<style>

</style>