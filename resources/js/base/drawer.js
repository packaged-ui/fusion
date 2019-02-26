(function (window, document) {

  window.Elegance.on(
    document, 'click', '.drawer__toggle',
    function (e) {
      var ele = document.querySelector('.drawer');
      if(ele)
      {
        if(ele.classList.contains('open'))
        {
          ele.classList.remove('open');
        }
        else
        {
          ele.classList.add('open');
        }
        e.stopPropagation();
        e.stopImmediatePropagation();
      }
    }
  );

  window.Elegance.on(
    document, 'click', '.drawer[reveal="modal"].open + .drawer-app-content',
    function (e) {
      document.querySelector('.drawer').classList.remove('open');
    }
  );

}(window, document));
