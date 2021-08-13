import './tabs.css';
import {on} from '../../../Foundation/res/events.js';

let _init = false;

export function init(rootElement = document)
{
  if(_init)
  {
    return;
  }
  _init = true;

  on(
    rootElement, 'click', '.tab__label',
    (e) => SetActive(e.delegateTarget, e.delegateTarget.getAttribute('data-tab-id'))
  );

  //Set the correct active tab from the url fragment
  if(window.location.hash.startsWith('#f-tb-'))
  {
    let tabID = window.location.hash.substring(1);
    rootElement.querySelectorAll('[data-tab-id=\'' + tabID + '\']').forEach(
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
