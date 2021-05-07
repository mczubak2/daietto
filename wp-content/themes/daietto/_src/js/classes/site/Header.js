export default class Header
{
  constructor()
  {
    if (!this.setVars()) return;
    this.setEvents();
  }

  setVars()
  {
    this.selectors = {
      header: document.querySelector('[data-header]')
    }
    if (!this.selectors.header) return;

    return true;
  }

  setEvents()
  {

  }
}
