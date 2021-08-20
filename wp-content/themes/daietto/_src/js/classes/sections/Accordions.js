import gsap from 'gsap';

export default class Accordions {

  constructor() {
    if (this.setVars()) return
    this.setEvents()
  }

  setVars() {
    this.accordions = document.querySelectorAll('[data-accordion]');
  }

  setEvents() {
    this.accordions.forEach(accordion =>
      accordion.addEventListener('click', this.setAnimations))
  }

  setAnimations() {
    const active = document.querySelector('[data-accordion].active')
    const activeContent = active ? active.querySelector('[data-accordion-content]') : null

    if (active) gsap.to(active, 0.2, {
      className: "-=accordion"
    })

    if (activeContent) gsap.to(activeContent, 0.2, {
      height: 0,
      autoAlpha: 0
    })
    
    this.classList.toggle('active');
    setTimeout(() => {
      gsap.to('[data-accordion].active [data-accordion-content]', 0.2, {
        height: 'auto',
        autoAlpha: 1
      })
    }, 50)
  }
}