window.Elegance = window.Elegance || {};

(function (window, document, Elegance) {

  Elegance.on(
    document, 'click', '.drawer__toggle',
    function (e) {
      // find parent
      var container = Elegance.closest(e.target, '.drawer-container');
      if(container)
      {
        if(container.classList.contains('drawer--open'))
        {
          container.classList.remove('drawer--open');
          localStorage.setItem('drawer--open', '0');
        }
        else
        {
          container.classList.add('drawer--open');
          localStorage.setItem('drawer--open', '1');
        }
        e.stopPropagation();
        e.stopImmediatePropagation();
      }
    }
  );

  Elegance.on(
    document, 'click', '.drawer.drawer--open + .drawer-app-content',
    function () {
      if(window.getComputedStyle(document.querySelector('.drawer-app-content'), "::before")
               .getPropertyValue('opacity') === '1')
      {
        document.querySelector('.drawer').classList.remove('drawer--open');
      }
    }
  );

}(window, document, window.Elegance));
