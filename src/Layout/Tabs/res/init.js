import './tabs.scss';
import {on} from '../../../Foundation/res/events.js';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  on(
    rootElement, 'click', '.tab__label',
    (e) => SetActive(e.delegateTarget, e.delegateTarget.getAttribute('data-tab-id'))
  );

  on(rootElement, 'click', '.tabs__close', (e) =>
  {
    setInactive(e.delegateTarget, e.delegateTarget.getAttribute('data-tab-close'));
  });

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
  const groupEle = ele.closest('.tabs');
  let tab = groupEle.querySelectorAll('#' + tabID)[0];
  let container = groupEle.querySelector('.tabs__container');

  function _removeClasses(...removeClasses)
  {
    [...groupEle.querySelectorAll(removeClasses.map((c) => '.' + c))]
      .filter((e) => e !== ele && e !== tab)
      .forEach(
        (cEle) =>
        {
          cEle.classList.remove(...removeClasses);
        }
      );
  }

  _removeClasses('tab__label--active', 'tab--active');

  ele.classList.add('tab__label--active');
  tab.classList.add('tab--active');
  container.classList.add('tabs__container--active');

  let evt = new CustomEvent('change', {bubbles: true, cancelable: true});
  tab.dispatchEvent(evt);
}

export function setInactive(ele, tabID)
{
  const groupEle = ele.closest('.tabs');
  let tab = groupEle.querySelectorAll('#' + tabID)[0];
  let container = groupEle.querySelector('.tabs__container');

  container.classList.remove('tabs__container--active');

  let evt = new CustomEvent('change', {bubbles: true, cancelable: true});
  tab.dispatchEvent(evt);
}
