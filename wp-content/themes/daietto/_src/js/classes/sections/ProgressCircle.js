const ProgressBar = require('progressbar.js');

export default class ProgressCircle
{
  constructor()
  {
    if (!this.setVars()) return;
    this.initProgress();
  }
  setVars()
  {
    this.circle = document.querySelector('[data-pie-chart]');
    this.colors = {
      start:  '#5EA76A',
      end:    '#6CC57C',
      trail:  '#DCEBF5'
    }
    
    if (!this.circle) return false;

    return true;
  }
  initProgress()
  {
    const bar = new ProgressBar.Circle(this.circle, {
      trailColor: this.colors.trial,
      trailWidth: 5,
      duration: 1400,
      easing: 'bounce',
      strokeWidth: 5,
      from: {color: this.colors.start, a:0},
      to: {color: this.colors.end, a:1},
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
      }
    });
    
    bar.animate(0.5);
  }
}