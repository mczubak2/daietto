export default class Accordion {
  constructor() {
    if (!this.setVars()) return;
    this.setEvents();
  }
  setVars() {
    this.selectors = {
      item:    '[data-accordin-item]',
      content: '[data-accordin-content]',
    };

    this.item = document.querySelector(this.selectors.item);
    this.content = document.querySelector(this.selectors.content);

    if (!this.item) return false;
    return true;
  }

  setEvents() {}
}