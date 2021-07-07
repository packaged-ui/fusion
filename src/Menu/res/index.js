import '../../Foundation/res';
import {SetActive} from '../../Lists/res';
import './menu.css';
import {on} from '../../Foundation/res/events.js';

function updateActiveMenu(location)
{
  document.querySelectorAll('.menu').forEach(
    (menu) =>
    {
      if(!menu.matches('.menu .menu'))
      {
        let mostSpecific;
        let mostSpecificLen = 0;
        menu.querySelectorAll('.menu__item[href]').forEach(
          (item) =>
          {
            let href = item.getAttribute('href');
            let regex;
            if(href[0] === '#')
            {
              regex = new RegExp(href.replace(/[\/.*+?^${}()|[\]\\]/g, '\\$&') + '$');
            }
            else
            {
              if(href[0] === '?')
              {
                href = location.pathname + href;
              }
              regex = new RegExp('^' + href.replace(/[\/.*+?^${}()|[\]\\]/g, '\\$&'));
            }
            if(regex.test(location.href.replace(location.origin, '')))
            {
              if(href.length > mostSpecificLen)
              {
                mostSpecific = item;
                mostSpecificLen = href.length;
              }
            }
          }
        );
        if(mostSpecific)
        {
          SetActive(mostSpecific);
        }
      }
    }
  );
}

on(
  document, 'click', '.menu__item',
  (e) =>
  {
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
