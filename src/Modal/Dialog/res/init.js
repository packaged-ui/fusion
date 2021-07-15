import './dialog.css';
import {init as initFoundation} from '../../../Foundation/res/init';

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
