import {onReadyState} from '@packaged-ui/ready-promise';

export function on(delegate, eventName, selector, callback)
{
  if(callback === undefined)
  {
    callback = selector;
    selector = '';
  }

  function _fn(e)
  {
    const path = e.path || (e.composedPath && e.composedPath());
    let t = path && path[0] || e.target;
    do
    {
      if((!selector) || (t.matches && t.matches(selector)))
      {
        e.delegateTarget = t;
        return callback(e);
      }

      // stop traversing up the dom once we reach the delegate
      if(delegate === t)
      {
        break;
      }
    }
    while((t = t.parentElement || (t.getRootNode() && t.getRootNode().host)));
  }

  delegate.addEventListener(eventName, _fn);
  return () => delegate.removeEventListener(eventName, _fn);
}

export function onReady(fn)
{
  onReadyState().then(fn);
}
