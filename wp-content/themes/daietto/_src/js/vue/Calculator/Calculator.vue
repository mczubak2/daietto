<template>
  <div class="calculator__component">
    <h1 class="calculator__header">
      Easily count your daily caloric needs.
    </h1>
    <div class="calculator__timeline"
      :style="{'--timelineProgress': `${timelineProgress}%`}">
      <div 
        class="calculator__timelineStep"
        v-for="( item, index ) in components"
        @click="currentComponent = components[index]"
        :key="index"
        :class="{'calculator__timelineStep--active': index <= components.indexOf(currentComponent)}">
      </div>
    </div>
    <div class="calculator__content">
      <transition 
        name="fadeSlide"
        mode="out-in">
        <keep-alive>
          <component 
            :is="currentComponent"

            @nextStep="$event ? setNextComponent() : true"
            @prevStep="$event ? setPrevComponent() : true"

            @genderValue="data.gender = $event"
            @ageValue="data.age = $event"
            @weightValue="data.weight = $event"
            @heightValue="data.height = $event"

            @calculateResult="$event ? calculateData(data) : true"
          />
        </keep-alive>
      </transition>
    </div>
  </div>
</template>

<script>
import CalculatorGender from './CalculatorGender';
import CalculatorAge    from './CalculatorAge';
import CalculatorHeight from './CalculatorHeight';
import CalculatorWeight from './CalculatorWeight';
import CalculatorResult from './CalculatorResult';

export default {
  name: 'Calculator',
  data() {
    return {
      currentComponent: CalculatorGender,
      timelineProgress: 0,
      components: [
        CalculatorGender,
        CalculatorAge,
        CalculatorHeight,
        CalculatorWeight,
        CalculatorResult
      ],
      data: {
        gender: null,
        age: null,
        height: null,
        weight: null,
      },
      errorMessage: ''
    }
  },
  methods: {
    setTimelineProgress() {
      let stepLength = 100 / (this.components.length - 1);
      let currentIndex = this.components.indexOf(this.currentComponent);
      this.timelineProgress = stepLength * currentIndex;
    },
    setNextComponent() {
      let currentIndex = this.components.indexOf(this.currentComponent);
      this.currentComponent = this.components[currentIndex + 1];
    },
    setPrevComponent() {
      let currentIndex = this.components.indexOf(this.currentComponent);
      this.currentComponent = this.components[currentIndex - 1];
    },
    calculateData(data) {
      let result;      

      if (data.gender === null) return this.errorMessage = 'Please confirm gender';
      if (data.age    === null) return this.errorMessage = 'Please complete age field';
      if (data.height === null) return this.errorMessage = 'Please complete height field';
      if (data.weight === null) return this.errorMessage = 'Please complete wegiht field';

      if (data.gender) {
        result =	655 + (9,6 * data.weight) + (1,8 * data.height) - (4,7 * data.age);
      } else {
        result = 66 + (13,7 * data.weight) + (5 * data.height) - (6,76 * data.age);
      }

      this.currentComponent = this.components[this.components.length - 1];
      console.log(result);

      return result;
    }
  },
  updated() {
    this.setTimelineProgress();
  }
}
</script>

<style>
  .fadeSlide-enter-active, .fadeSlide-leave-active {
    transition: .3s;
  }
  .fadeSlide-enter, .fadeSlide-leave-to {
    opacity: 0;
  }
  .fadeSlide-enter {
    transform: translateX(-30%);
  }
  .fadeSlide-leave-to {
    transform: translateX(30%);
  }
</style>