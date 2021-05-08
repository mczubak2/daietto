import Footer from './site/Footer';
import Header from './site/Header';


class Core
{
  constructor()
  {
    new Footer();
    new Header();
  }
}

const ready = (fn) => {
  if (document.attachEvent
    ? document.readyState === 'complete'
    : document.readyState !== 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
};

ready(() => new Core())