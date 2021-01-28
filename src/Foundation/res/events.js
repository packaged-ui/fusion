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
      while(t.parentElement && (t = t.parentElement) && delegate.contains(t));
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
