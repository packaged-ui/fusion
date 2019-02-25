(function (window, document) {

  window.Elegance.on(
    document, 'click', '.drawer__toggle',
    function () {
      var ele = document.querySelector('.drawer');
      if(ele.classList.contains('open'))
      {
        ele.classList.remove('open');
      }
      else
      {
        ele.classList.add('open');
      }
    }
  );

  window.Elegance.on(
    document, 'click', '.drawer-app-content',
    function () {
      document.querySelector('.drawer').classList.remove('open');
    }
  );

}(window, document));
