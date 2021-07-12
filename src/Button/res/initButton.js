import './button.scss';
import {init as initFoundation} from '../../Foundation/res';

let _init = false;

export function init()
{
  initFoundation();
  if(_init)
  {
    return;
  }
  _init = true;
}
