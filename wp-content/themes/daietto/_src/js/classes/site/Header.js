export default class Header
{
  constructor()
  {
    this.setVars()
    this.setEvents()
  }

  setVars()
  {
    this.header = document.querySelector('.header')
    if (!this.header) return

    return true;
  }

  setEvents()
  {
    document.addEventListener('scroll', () => this.headerSticky())
  }

  headerSticky()
  {
    let scrollTop = window.pageYOffset;
    
    if (scrollTop > 0) 
    this.header.classList.add('header--sticky')

    else 
    this.header.classList.remove('header--sticky')
  }
}
