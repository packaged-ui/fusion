import {on} from './events.js';
import * as clipboard from 'clipboard-polyfill';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  on(
    rootElement, 'click', '[data-copy]', (e) =>
    {
      clipboard.writeText(e.delegateTarget.getAttribute('data-copy'));
    }
  );
}
