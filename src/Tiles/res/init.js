import './tiles.scss';
import {init as initCopy} from '../../Foundation/res/data-copy.js';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  initCopy(rootElement);
}
