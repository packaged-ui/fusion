import './menu.css';
import {on, onReady} from '../../Foundation/res/events.js';
import {SetActive} from '../../Lists/res/init.js';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  on(rootElement, 'click', '.menu__item', (e) => SetActive(e.delegateTarget));

  function _updateFn() {updateActiveMenu(window.location, rootElement);}

  _updateFn();
  onReady(_updateFn);
  window.addEventListener('popstate', _updateFn);
}

function updateActiveMenu(location, rootElement)
{
  rootElement.querySelectorAll('.menu').forEach(
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
