<template>
  <div
    class="calculator__component"
    data-aos="fade-up"
    data-aos-anchor-placement="top-center"
  >
    <h1 class="calculator__header">
      {{ headerText }}
    </h1>
    <div
      class="calculator__timeline"
      :style="{ '--timelineProgress': `${timelineProgress}%` }"
    >
      <div
        v-for="(item, index) in components"
        :key="index"
        class="calculator__timelineStep"
        :class="{
          'calculator__timelineStep--active':
            index <= components.indexOf(currentComponent),
        }"
        @click="currentComponent = components[index]"
      ></div>
    </div>
    <div class="calculator__content">
      <transition name="fadeSlide" mode="out-in">
        <keep-alive>
          <component
            :is="currentComponent"
            @nextStep="setNextComponent($event)"
            @prevStep="setPrevComponent($event)"
            @firstStep="setFirstComponent($event)"
            @calculateResult="$event ? calculateData(data) : true"
            @genderValue="data.gender = $event"
            @ageValue="data.age = $event"
            @weightValue="data.weight = $event"
            @heightValue="data.height = $event"
            :dailyCalories="result"
            :ageContent="ageContent"
            :genderContent="genderContent"
            :heightContent="heightContent"
            :weightContent="weightContent"
            :resultContent="resultContent"
          />
        </keep-alive>
      </transition>
    </div>
  </div>
</template>

<script>
import CalculatorAge from "./CalculatorAge";
import CalculatorGender from "./CalculatorGender";
import CalculatorHeight from "./CalculatorHeight";
import CalculatorWeight from "./CalculatorWeight";
import CalculatorResult from "./CalculatorResult";

export default {
  name: "Calculator",
  props: {
    headerText: {
      type: String,
      required: true,
    },
    genderContent: {
      type: Object,
      required: true,
    },
    ageContent: {
      type: Object,
      required: true,
    },
    heightContent: {
      type: Object,
      required: true,
    },
    weightContent: {
      type: Object,
      required: true,
    },
    resultContent: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      currentComponent: CalculatorAge,
      timelineProgress: 0,
      components: [
        CalculatorAge,
        CalculatorGender,
        CalculatorHeight,
        CalculatorWeight,
        CalculatorResult,
      ],
      data: {
        age: 25,
        gender: true,
        height: 200,
        weight: 200,
      },
      errorMessage: "",
      result: 0,
    };
  },
  methods: {
    setTimelineProgress() {
      let stepLength = 100 / (this.components.length - 1);
      let currentIndex = this.components.indexOf(this.currentComponent);
      this.timelineProgress = stepLength * currentIndex;
    },
    setNextComponent(value) {
      if (value) {
        let currentIndex = this.components.indexOf(this.currentComponent);
        this.currentComponent = this.components[currentIndex + 1];
      }
    },
    setPrevComponent(value) {
      if (value) {
        let currentIndex = this.components.indexOf(this.currentComponent);
        this.currentComponent = this.components[currentIndex - 1];
      }
    },
    setFirstComponent(value) {
      if (value) this.currentComponent = this.components[0];
    },
    async calculateData(data) {
      let result;
      await data;

      if (data.gender === null)
        return (this.errorMessage = "Please confirm gender");
      if (data.age === null)
        return (this.errorMessage = "Please complete age field");
      if (data.height === null)
        return (this.errorMessage = "Please complete height field");
      if (data.weight === null)
        return (this.errorMessage = "Please complete wegiht field");

      if (data.gender) {
        result = 655 + 9.6 * data.weight + 1.8 * data.height - 4.7 * data.age;
      } else {
        result = 66 + 13.7 * data.weight + 5 * data.height - 6.76 * data.age;
      }

      this.currentComponent = this.components[this.components.length - 1];
      this.result = Math.round(result);
    },
  },
  updated() {
    this.setTimelineProgress();
  },
};
</script>
