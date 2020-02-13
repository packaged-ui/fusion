import {on} from '../../Foundation/res';
import './toggleButton.css';

on(
  document, 'click', '.toggle-button',
  (e) =>
  {
    e.preventDefault();

    let button = e.delegateTarget;
    let checkEle = button.querySelector('.btn__toggle-button-checkbox');
    if(checkEle.getAttribute('type') === 'radio' && checkEle.checked)
    {
      return;
    }
    checkEle.checked = !checkEle.checked;

    _updateStyle(button);
    _dispatchChangeEvent(button);

    if(checkEle.hasAttribute('name') && checkEle.getAttribute('type') === 'radio')
    {
      const radioElements = document.querySelectorAll(
        '.btn__toggle-button-checkbox[type="radio"][name="' + checkEle.getAttribute('name') + '"]',
      );
      radioElements.forEach(
        radio =>
        {
          if(radio !== checkEle)
          {
            const radioButton = radio.closest('.toggle-button');
            _updateStyle(radioButton);
          }
        },
      );
    }
  },
);

function _updateStyle(button)
{
  let checkedClasses = button.getAttribute('checked-class').split(' ').filter(name => !!name);
  let checkEle = button.querySelector('.btn__toggle-button-checkbox');
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
}

function _dispatchChangeEvent(button)
{
  if('createEvent' in document)
  {
    let evt = document.createEvent('HTMLEvents');
    evt.initEvent('change', true, true);
    button.dispatchEvent(evt);
  }
}
