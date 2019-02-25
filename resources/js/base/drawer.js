(function (window, document) {

  document.on(
    'click', '.drawer__toggle',
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

  document.on(
    'click', '.drawer-app-content',
    function () {
      document.querySelector('.drawer').classList.remove('open');
    }
  );

}(window, document));
