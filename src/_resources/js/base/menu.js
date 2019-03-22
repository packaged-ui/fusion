window.Elegance = window.Elegance || {};

(function (window, document, Elegance) {

  function updateActiveMenu(url) {
    var menus = document.querySelectorAll('.menu');
    for(var mi in menus)
    {
      if(menus.hasOwnProperty(mi))
      {
        var menu = menus[mi];
        if(!menu.matches('.menu .menu'))
        {
          var mostSpecific;
          var mostSpecificLen = 0;
          var items = menu.querySelectorAll('.menu-item[href]');
          for(var i in items)
          {
            if(items.hasOwnProperty(i))
            {
              var item = items[i];
              var href = item.getAttribute('href');
              var regex = new RegExp('^' + href);
              if(regex.test(url))
              {
                if(href.length > mostSpecificLen)
                {
                  mostSpecific = item;
                  mostSpecificLen = href.length;
                }
              }
            }
          }
          if(mostSpecific)
          {
            Elegance.List.SetActive(mostSpecific);
          }
        }
      }
    }
  }

  updateActiveMenu(window.location.pathname);
  window.addEventListener('popstate', function () {updateActiveMenu(window.location.pathname);});

}(window, document, window.Elegance));
