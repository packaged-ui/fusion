import 'normalize.css';
import './_base.css';
import './_colors.css';
import './_dark.css';

export function on(delegate, eventName, selector, callback)
{
  if(callback === undefined)
  {
    callback = selector;
    selector = '';
  }
  delegate.addEventListener(
    eventName,
    function (e)
    {
      if(!selector)
      {
        return callback(e);
      }
      let t = e.target;
      do
      {
        if(t.matches(selector))
        {
          e.delegateTarget = t;
          return callback(e);
        }
      }
      while(t.parentElement && (t = t.parentElement));
    },
  );
}

export function onReady(fn)
{
  if(document.readyState === 'loading')
  {
    document.addEventListener('DOMContentLoaded', fn);
  }
  else
  {
    fn();
  }
}

export function closest(element, selector)
{
  do
  {
    if(element.matches(selector))
    {
      return element;
    }
  }
  while((element = element.parentElement));
  return null;
}

onReady(
  function ()
  {
    setTimeout(function () {document.body.classList.add('f-loaded');}, 0);
  },
);

window.addEventListener(
  'touchstart',
  function _fn()
  {
    document.body.classList.add('touch-enabled');
    window.removeEventListener('touchstart', _fn, false);
  },
  false,
);
