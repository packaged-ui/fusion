import '../../Foundation/res';
import {SetActive} from '../../Lists/res';
import './menu.css';

function updateActiveMenu(location)
{
  let menus = document.querySelectorAll('.menu');
  for(let mi in menus)
  {
    if(menus.hasOwnProperty(mi))
    {
      let menu = menus[mi];
      if(!menu.matches('.menu .menu'))
      {
        let mostSpecific;
        let mostSpecificLen = 0;
        let items = menu.querySelectorAll('.menu-item[href]');
        for(let i in items)
        {
          if(items.hasOwnProperty(i))
          {
            let item = items[i];
            let href = item.getAttribute('href');
            if(href[0] === '?')
            {
              href = location.pathname + href;
            }

            let regex = new RegExp('^' + href.replace(/[\/.*+?^${}()|[\]\\]/g, '\\$&'));
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
          SetActive(mostSpecific);
        }
      }
    }
  }
}

updateActiveMenu(window.location);
window.addEventListener('popstate', function () {updateActiveMenu(window.location);});
