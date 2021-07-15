import './toggleInput.css';
import {init as initFoundation} from '../../Foundation/res/init';
import {on} from '../../Foundation/res/events';

let _init = false;

export function init(rootElement = document)
{
  initFoundation(rootElement);
  if(_init)
  {
    return;
  }
  _init = true;

  on(
    rootElement, 'click', '.toggle-button',
    (e) =>
    {
      e.preventDefault();

      let button = e.delegateTarget;
      let checkEle = button.querySelector('.toggle-button__checkbox');
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
          '.toggle-button__checkbox[type="radio"][name="' + checkEle.getAttribute('name') + '"]',
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
}

function _updateStyle(button)
{
  const checkedClasses = (button.getAttribute('checked-class') || '').split(' ').filter(name => !!name);
  const checkEle = button.querySelector('.toggle-button__checkbox');
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
