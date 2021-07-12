import './tabs.css';
import {init as initFoundation} from '../../../Foundation/res/init';
import {on} from '../../../Foundation/res/events';

let _init = false;

export function init()
{
  initFoundation();
  if(_init)
  {
    return;
  }
  _init = true;

  on(
    document, 'click', '.tab__label',
    function (e)
    {
      let ele = e.target;
      while((!ele.matches('.tab__label')) && ele.parentElement)
      {
        ele = ele.parentElement;
      }
      SetActive(ele, ele.getAttribute('data-tab-id'));
    },
  );

  //Set the correct active tab from the url fragment
  if(window.location.hash.startsWith('#f-tb-'))
  {
    let tabID = window.location.hash.substring(1);
    document.querySelectorAll('[data-tab-id=\'' + tabID + '\']').forEach(
      (label) =>
      {
        SetActive(label, tabID);
      }
    );
  }
}

export function SetActive(ele, tabID)
{
  // find top tabContainer
  let tabContainer;
  let t = ele;
  do
  {
    if(t.matches('.tabs'))
    {
      tabContainer = t;
    }
  }
  while((t = t.parentElement));
  let tab = tabContainer.querySelectorAll('#' + tabID)[0];

  function removeClass(removeClass)
  {
    tabContainer.querySelectorAll('.' + removeClass).forEach(
      (cEle) =>
      {
        if(cEle !== ele)
        {
          cEle.classList.remove(removeClass);
        }
      }
    );
  }

  removeClass('tab__label--active');
  removeClass('tab--active');

  ele.classList.add('tab__label--active');
  tab.classList.add('tab--active');

  let evt = new CustomEvent('change', {bubbles: true, cancelable: true});
  tab.dispatchEvent(evt);
}
