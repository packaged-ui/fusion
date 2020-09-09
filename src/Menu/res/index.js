import {SetActive} from '../../Lists/res';
import './menu.css';
import {on} from "../../Foundation/res";

function updateActiveMenu(location) {
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
        let items = menu.querySelectorAll('.menu__item[href]');
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

on(
  document, 'click', '.menu__item',
  function (e) {
    let ele = e.target;
    while((!ele.matches('.menu__item')) && ele.parentElement)
    {
      ele = ele.parentElement;
    }
    SetActive(ele);
  },
);

updateActiveMenu(window.location);
window.addEventListener('popstate', function () {updateActiveMenu(window.location);});
