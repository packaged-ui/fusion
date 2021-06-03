import {onReadyState} from '@packaged-ui/ready-promise';

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
      let t = e.target;
      if(t === delegate || !selector)
      {
        return callback(e);
      }

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
  onReadyState().then(fn);
}
