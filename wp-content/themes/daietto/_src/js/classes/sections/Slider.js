import Swiper from 'swiper';

export default class Slider {
  constructor() {
    if (!this.setVars()) return;
    this.initSwiper();
  }

  setVars() {
    this.container = document.querySelector('.swiper-container');
    if (!this.container) return false;

    return true;
  }

  initSwiper() {
    const swiper = new Swiper(this.container, {
      speed: 400,
      spaceBetween: 100,
    });
    console.log(swiper);
  }
}
