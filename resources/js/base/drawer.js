(function (window, document) {

  window.Elegance.on(
    document, 'click', '.drawer__toggle',
    function (e) {
      var ele = document.querySelector('.drawer');
      if(ele)
      {
        if(ele.classList.contains('drawer--open'))
        {
          ele.classList.remove('drawer--open');
        }
        else
        {
          ele.classList.add('drawer--open');
        }
        e.stopPropagation();
        e.stopImmediatePropagation();
      }
    }
  );

  window.Elegance.on(
    document, 'click', '.drawer[reveal="modal"].drawer--open + .drawer-app-content',
    function (e) {
      document.querySelector('.drawer').classList.remove('drawer--open');
    }
  );

}(window, document));
