import Swiper, { Navigation } from 'swiper';

export default class Slider {
  constructor() {
    if (!this.setVars()) return;
    this.initSwiper();
  }

  setVars() {
    this.selectors = {
      container:  '.swiper-container',
      buttonPrev: '.swiper-button-prev',
      buttonNext: '.swiper-button-next',
    }
    if (!this.selectors) return false;

    return true;
  }

  initSwiper() {
    Swiper.use([Navigation]);
    this.mySwiper = new Swiper(this.selectors.container, {
      navigation: {
        nextEl: this.selectors.buttonNext,
        prevEl: this.selectors.buttonPrev,
      },
      spaceBetween: 0,
      loop: true,
      centeredSlides: true,
    });
  }
}
