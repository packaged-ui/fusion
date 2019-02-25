(function (window, document, undefined) {
  Node.prototype.on = function (eventName, selector, callback) {
    if(callback === undefined)
    {
      callback = selector;
      selector = '';
    }
    this.addEventListener(eventName, function (e) {
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
    })
  };
}(window, document));
