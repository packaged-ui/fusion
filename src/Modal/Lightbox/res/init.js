import {Modal} from '@packaged-ui/modal/src/index.js';
import {onReadyState} from '@packaged-ui/ready-promise';
import {on} from '../../../Foundation/res/events.js';

let _init = false;

export function init(rootElement = document)
{
  Modal.init(rootElement);
  if(_init)
  {
    return;
  }
  _init = true;

  // auto close
  let downTarget = null;
  on(
    rootElement, 'mousedown', '.modal', (e) =>
    {
      if(e.target.matches('.modal'))
      {
        downTarget = e.target;
      }
    }
  );
  on(
    rootElement, 'mouseup', '.modal', (e) =>
    {
      if(downTarget === e.target)
      {
        const content = e.delegateTarget.querySelector('.modal__content.lightbox');
        if(content)
        {
          Modal.hide(content);
        }
      }
    }
  );
  on(
    rootElement, 'keyup', (e) =>
    {
      if(e.key === 'Escape' || e.key === 'Esc' || e.keyCode === 27)
      {
        // find the last modal's closer
        const closer = rootElement.querySelector('.modal:last-of-type .modal__content.lightbox');
        if(closer)
        {
          e.preventDefault();
          Modal.hide(closer);
        }
      }
    }
  );

  //Auto Launch
  onReadyState()
    .then(() => rootElement.querySelectorAll('.lightbox--auto-launch').forEach(lb => Modal.create(lb).show()));
}
