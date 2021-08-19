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
      let t = e.path && e.path[0] || e.target;
      do
      {
        if((!selector) || t.matches(selector))
        {
          e.delegateTarget = t;
          return callback(e);
        }
      }
      while((t = t.parentElement || (t.getRootNode() && t.getRootNode().host)) && delegate.contains(t));
    },
  );
}

export function onReady(fn)
{
  onReadyState().then(fn);
}
