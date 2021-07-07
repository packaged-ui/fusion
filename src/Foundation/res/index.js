import './css';
import {onReadyState} from '@packaged-ui/ready-promise';

export * from './events';

onReadyState().then(() => document.body.classList.add('f-loaded'));

if(navigator && navigator.maxTouchPoints > 0)
{
  document.body.classList.add('touch-enabled');
}

window.addEventListener(
  'touchstart',
  function _fn() {
    document.body.classList.add('touch-enabled', 'touch-started');
    window.removeEventListener('touchstart', _fn, false);
  },
  false,
);
