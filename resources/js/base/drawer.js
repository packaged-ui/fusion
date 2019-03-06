window.Elegance = window.Elegance || {};

(function (window, document, Elegance) {

  Elegance.on(
    document, 'click', '.drawer__toggle',
    function (e) {
      // find parent
      var container = Elegance.closest(e.target, '.drawer-container');
      if(container)
      {
        var drawer = container.querySelector('.drawer');
        var storageKey = 'drawer--open-' + drawer.getAttribute('position');
        if(container.classList.contains('drawer--open'))
        {
          container.classList.remove('drawer--open');
          localStorage.setItem(storageKey, '0');
        }
        else
        {
          container.classList.add('drawer--open');
          localStorage.setItem(storageKey, '1');
        }
        e.stopPropagation();
        e.stopImmediatePropagation();
      }
    }
  );

  Elegance.on(
    document, 'click', '.drawer-container.drawer--open > .drawer-app-content',
    function (e) {
      if(e.target.matches('.drawer-app-content'))
      {
        var style = window.getComputedStyle(e.target, "::before");
        if(style.getPropertyValue('opacity') === '1')
        {
          var container = Elegance.closest(e.target, '.drawer-container');
          var drawer = container.querySelector('.drawer');
          var storageKey = 'drawer--open-' + drawer.getAttribute('position');

          container.classList.remove('drawer--open');
          localStorage.setItem(storageKey, '0');
        }
      }
    }
  );

}(window, document, window.Elegance));
