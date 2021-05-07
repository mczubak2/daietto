import Swiper from 'swiper';

class HeroSliderCore
{
  constructor(wrapper)
  {
    this.wrapper = wrapper;
    if (!this.setVars()) return;
  }

  setVars()
  {
    this.sliderContainer = this.wrapper.querySelector('[data-hero-slider]');
    this.slider = this.sliderInit();

    return true;
  }

  sliderInit()
  {
    return new Swiper(this.sliderContainer, {
      loop: true,
      fadeEffect: { crossFade: true },
      effect: "fade",
      autoplay: {
        delay: 5000,
      },
      speed: 800,
      slidersPerView: 1,
      allowTouchMove: false,
      pagination: {
        el: '.heroHeader__sliderPagination',
        clickable: true,
      },
    });
  }
}

export default class HeroSlider
{
  constructor()
  {
    this.sections = [];

    const heroImageSlider = document.querySelector('[data-hero-image-slider-wrapper]');
    if (heroImageSlider) this.sections.push(heroImageSlider);
    const heroTextSlider = document.querySelector('[data-hero-text-slider-wrapper]');
    if (heroTextSlider) this.sections.push(heroTextSlider);

    if (!this.sections.length) return;

    this.sections.forEach((section) => {
      new HeroSliderCore(section);
    });
  }
}