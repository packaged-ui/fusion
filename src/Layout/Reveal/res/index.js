import './reveal.css';
import {on} from '../../../Foundation/res';

on(document, 'click', '[reveal-launcher]', (e) =>
{
  const targetId = e.delegateTarget.getAttribute('reveal-launcher');
  const reveal = document.querySelector(`#${targetId}`);
  if(reveal)
  {
    reveal.classList.toggle('show');
  }
  else
  {
    console.warn('Cannot reveal. The target does not exist');
  }
  if(reveal.hasAttribute('reveal-destructive'))
  {
    document.querySelectorAll(`[reveal-launcher="${targetId}"]`)
            .forEach(ele => ele.parentNode.removeChild(ele));
  }
});
