import './reveal.css';
import {init as initFoundation} from '../../../Foundation/res/init';
import {on} from '../../../Foundation/res/events';

let _init = false;

export function init()
{
  initFoundation();
  if(_init)
  {
    return;
  }
  _init = true;

  on(document, 'click', '[reveal-launcher]', (e) =>
  {
    const targetId = e.delegateTarget.getAttribute('reveal-launcher');
    const reveal = document.getElementById(targetId);

    if(reveal)
    {
      const show = reveal.classList.toggle('show');
      const launchers = document.querySelectorAll(`[reveal-launcher="${targetId}"]`);

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
