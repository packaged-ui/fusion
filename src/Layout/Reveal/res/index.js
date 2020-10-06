import './reveal.css';
import {on} from '../../../Foundation/res';

on(document, 'click', '[reveal-launcher]', (e) =>
{
  const targetId = e.delegateTarget.getAttribute('reveal-launcher');
  const reveal = document.querySelector(`#${targetId}`);
  const revealIconOpen = document.querySelector('[reveal-icon-open]');
  const revealIconClose = document.querySelector('[reveal-icon-close]');

  if(reveal)
  {
    reveal.classList.toggle('show');
    revealIconOpen.classList.toggle('hide');
    revealIconClose.classList.toggle('hide')
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
