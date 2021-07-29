import './reveal.css';
import {on} from '../../../Foundation/res/events.js';

let _init = false;

export function init(rootElement = document)
{
  if(_init)
  {
    return;
  }
  _init = true;

  on(rootElement, 'click', '[reveal-launcher]', (e) =>
  {
    const targetId = e.delegateTarget.getAttribute('reveal-launcher');
    const reveal = rootElement.querySelector('#' + targetId);

    if(reveal)
    {
      const show = reveal.classList.toggle('show');
      const launchers = rootElement.querySelectorAll(`[reveal-launcher="${targetId}"]`);

      if(reveal.hasAttribute('reveal-destructive'))
      {
        launchers.forEach(ele => ele.parentNode.removeChild(ele));
      }
      else
      {
        launchers.forEach(ele => ele.toggleAttribute('reveal-open', show));
      }
    }
    else
    {
      console.warn('Cannot reveal. The target does not exist');
    }
  });
}
