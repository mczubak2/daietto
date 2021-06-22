import Footer from './site/Footer';
import Header from './site/Header';
import ProgressCircle from './sections/ProgressCircle';


class Core
{
  constructor()
  {
    new Footer();
    new Header();
    new ProgressCircle();
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