import './ribbons.css';

let _init = false;

export function init(rootElement = document)
{
  if(_init)
  {
    return;
  }
  _init = true;
}
