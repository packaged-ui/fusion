import './css';
import {onReady} from './events';

export * from './events';

onReady(() => document.body.classList.add('f-loaded'));

window.addEventListener(
  'touchstart',
  function _fn()
  {
    document.body.classList.add('touch-enabled');
    window.removeEventListener('touchstart', _fn, false);
  },
  false,
);
