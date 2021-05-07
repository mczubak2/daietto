export default class Header
{
  constructor()
  {
    if (!this.setVars()) return;
    this.setEvents();
  }

  setVars()
  {
    this.section = document.querySelector('.header');
    if (!this.section) return;

    return true;
  }

  setEvents()
  {

  }
}
