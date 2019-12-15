window.FusionUi = window.FusionUi || {};

(function (window, document, undefined) {
  window.FusionUi.on = function (delegate, eventName, selector, callback) {
    if(callback === undefined)
    {
      callback = selector;
      selector = '';
    }
    delegate.addEventListener(
      eventName,
      function (e) {
        if(!selector)
        {
          return callback(e);
        }
        var t = e.target;
        do
        {
          if(t.matches(selector))
          {
            return callback(e);
          }
        }
        while(t.parentElement && (t = t.parentElement))
      }
    );
  };

  window.FusionUi.onReady = function (fn) {
    if(document.readyState === "loading")
    {
      document.addEventListener('DOMContentLoaded', fn);
    }
    else
    {
      fn();
    }
  };

  window.FusionUi.closest = function (element, selector) {
    do
    {
      if(element.matches(selector))
      {
        return element;
      }
    }
    while((element = element.parentElement));
    return null;
  };

  window.FusionUi.onReady(
    function () {
      setTimeout(function () {document.body.classList.add('f-loaded');}, 0)
    }
  );

  window.addEventListener(
    'touchstart',
    function _fn() {
      document.body.classList.add('touch-enabled');
      window.removeEventListener('touchstart', _fn, false);
    },
    false
  );

}(window, document));
