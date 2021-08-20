import gsap from 'gsap';
import ScrollTrigger from 'gsap/src/ScrollTrigger';

export default class AnimateOnScroll {
  constructor() {
    if (!this.setVars()) return;
    this.initGsap();
  }
  setVars() {

    this.selectors = {
      element: '[data-animate-on-scroll-element]',
      bucket: '[data-animate-on-scroll-bucket]',
      list: '[data-animate-on-scroll-list]',
      container: '[data-animate-on-scroll-container]',
    }

    this.container = document.querySelector(this.selectors.container);
    if (!this.container) return false;

    return true;
  }

  initGsap() {
    gsap.registerPlugin(ScrollTrigger);

    gsap.to(this.selectors.element, {
      scrollTrigger: {
        trigger: this.selectors.container,
        start: 'top 40%',
        end: 'bottom 60%',
        markers: true,
        scrub: 2,
      },
      y: -100,
      x: 50,
      rotation: 360,
      scale: 2,
      duration: 3,
      stagger: 1,
      yoyo: true
    })

    gsap.to(this.selectors.bucket, {
      scrollTrigger: {
        trigger: this.selectors.container,
        start: 'top 40%',
        end: 'bottom 60%',
        markers: true,
        scrub: 1,
      },
      x: 150,
      duration: 2,
      yoyo: true
    })
  }
}