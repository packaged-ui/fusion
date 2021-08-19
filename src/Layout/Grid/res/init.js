import './grid.css';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);
}
