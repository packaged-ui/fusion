import './color.scss';
import {init as initFoundation} from '../../Foundation/res';

let _init = false;

export function init(rootElement = document)
{
  initFoundation(rootElement);
  if(_init)
  {
    return;
  }
  _init = true;
}
