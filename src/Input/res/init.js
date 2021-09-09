import './toggleInput.css';
import './togglebutton.scss';

import {on} from '../../Foundation/res';

let _init = new WeakSet();

export function init(rootElement = document) {
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  on(
    rootElement, 'click', '.toggle-input',
    (e) => {
      e.preventDefault();

      let button = e.delegateTarget;
      let checkEle = button.querySelector('.toggle-input__checkbox');
      if(checkEle.getAttribute('type') === 'radio' && checkEle.checked)
      {
        return;
      }
      checkEle.checked = !checkEle.checked;

      _updateStyle(button);
      let evt = new CustomEvent('change', {bubbles: true, cancelable: true});
      button.dispatchEvent(evt);

      if(checkEle.hasAttribute('name') && checkEle.getAttribute('type') === 'radio')
      {
        const radioElements = rootElement.querySelectorAll(
          '.toggle-input__checkbox[type="radio"][name="' + checkEle.getAttribute('name') + '"]',
        );
        radioElements.forEach(
          radio => {
            if(radio !== checkEle)
            {
              const radioButton = radio.closest('.toggle-input');
              _updateStyle(radioButton);
            }
          },
        );
      }
    },
  );
}

function _updateStyle(button) {
  const checkedClasses = (button.getAttribute('checked-class') || '').split(' ').filter(name => !!name);
  const checkEle = button.querySelector('.toggle-input__checkbox');
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
