import {on} from '../../Foundation/res';
import './toggleButton.css';

on(
  document, 'click', '.toggle-button',
  (e) =>
  {
    e.preventDefault();

    let button = e.delegateTarget;
    let checkedClasses = button.getAttribute('checked-class').split(' ').filter(name => !!name);
    let checkEle = e.delegateTarget.querySelector('.btn__toggle-button-checkbox');
    checkEle.checked = !checkEle.checked;
    if(checkEle.checked)
    {
      button.setAttribute('checked', '');
      if(checkedClasses.length)
      {
        button.classList.add.apply(button.classList, checkedClasses);
      }
    }
    else
    {
      button.removeAttribute('checked');
      if(checkedClasses.length)
      {
        button.classList.remove.apply(button.classList, checkedClasses);
      }
    }

    if('createEvent' in document)
    {
      let evt = document.createEvent('HTMLEvents');
      evt.initEvent('change', true, true);
      button.dispatchEvent(evt);
    }
  },
);
