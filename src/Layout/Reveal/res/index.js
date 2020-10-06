import './reveal.css';
import {on} from '../../../Foundation/res';

on(document, 'click', '[reveal-launcher]', (e) => {
  const targetId = e.delegateTarget.getAttribute('reveal-launcher');
  const reveal = document.querySelector(`#${targetId}`);

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
