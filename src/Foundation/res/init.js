import './css.js';
import {onReadyState} from '@packaged-ui/ready-promise';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  onReadyState().then(() => document.body.classList.add('f-loaded'));

  if(navigator && navigator.maxTouchPoints > 0)
  {
    document.body.classList.add('touch-enabled');
  }

  window.addEventListener(
    'touchstart',
    function _fn()
    {
      document.body.classList.add('touch-enabled', 'touch-started');
      window.removeEventListener('touchstart', _fn, false);
    },
    false,
  );
}
