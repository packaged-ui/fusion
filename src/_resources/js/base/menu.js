window.FusionUi = window.FusionUi || {};

(function (window, document, FusionUi)
{
  function updateActiveMenu(location)
  {
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
              if(href[0] === '?')
              {
                href = location.pathname + href;
              }

              var regex = new RegExp('^' + href.replace(/[\/.*+?^${}()|[\]\\]/g, '\\$&'));
              if(regex.test(location.href.replace(location.origin, '')))
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
            FusionUi.List.SetActive(mostSpecific);
          }
        }
      }
    }
  }

  updateActiveMenu(window.location);
  window.addEventListener('popstate', function () {updateActiveMenu(window.location);});

}(window, document, window.FusionUi));
