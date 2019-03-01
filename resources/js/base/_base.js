window.Elegance = window.Elegance || {};

(function (window, document, undefined) {
  window.Elegance.on = function (delegate, eventName, selector, callback) {
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

  window.Elegance.onReady = function (fn) {
    if(document.readyState === "loading")
    {
      document.addEventListener('DOMContentLoaded', fn);
    }
    else
    {
      fn();
    }
  };

  window.Elegance.onReady(function () {
    setTimeout(function () {document.body.classList.add('f-loaded');}, 0)
  });

}(window, document));
