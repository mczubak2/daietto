export default class Footer
{
  constructor()
  {
    if (!this.setVars()) return;

    this.setEvents();
  }

  setVars()
  {
    this.element = document.querySelector('.footer');
    if (!this.element) return;

    return true;
  }

  setEvents()
  {

  }
}
